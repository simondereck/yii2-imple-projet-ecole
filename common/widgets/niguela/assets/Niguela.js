(function ($) {

    var size = 20;

    var formName = null;
    var imageWidth,imageHeight;

    const canvas = document.getElementById("neguela-top-canvas");
    const ctx = canvas.getContext("2d");


    const canvas_bottom = document.getElementById("neguela-bottom-canvas");
    const ctx_bottom = canvas_bottom.getContext("2d");

    var canvas_show = document.getElementById("neguela-show-area");
    var ctx_show = canvas_show.getContext("2d");


    canvas.style.width = "300px";
    canvas.style.height = "300px";

    canvas.width = 150;
    canvas.height = 150;

    canvas_bottom.style.width = "300px";
    canvas_bottom.style.height = "300px";

    canvas_bottom.width = 150;
    canvas_bottom.height = 150;

    canvas_show.style.width = "150px";
    canvas_show.style.height = "150px";


    canvas_show.width = 75;
    canvas_show.height = 75;

    var widthDrawImage = 0,heightDrawImage = 0;


    var imageShow = document.getElementById("neguela-imageShow");
    var ua = navigator.userAgent.toLowerCase();

    const magicX = 0.1;

    var x=0,y=0;
    var move_x = 0, move_y = 0;

    const move_step = 30;


// function getBase64Image(img) {
//     var canvas = document.createElement("canvas");
//     canvas.width = img.width;
//     canvas.height = img.height;
//     var ctx = canvas.getContext("2d");
//     ctx.drawImage(img, 0, 0, img.width, img.height);
//     var ext = img.src.substring(img.src.lastIndexOf(".")+1).toLowerCase();
//     var dataURL = canvas.toDataURL("image/"+ext);
//     return dataURL;
// }


    var reset = function () {
        widthDrawImage = 0;
        heightDrawImage = 0;
        ctx_bottom.clearRect(0,0,canvas.width,canvas.height);
    };




    function html5Reader(file) {
        var fileObj = file.files[0];
        console.log(fileObj);
        var img;
        if (!document.getElementById("image")) {
            img = document.createElement("img");
        } else{
            img = document.getElementById("image");
        }
        // URL.createObjectURL safari不支持
        img.src = URL.createObjectURL(fileObj);
        img.id = "image";
        img.name = "uploadImage";
        // img.width = 300;
        // img.height = 300;
        img.onload =function(data) {
            console.log(data); // 打印出base64编码
            var image = document.getElementById("image");
            console.log("width and height",this.width,this.height);
            // console.log($("").prop('naturalHeight'));
            imageWidth = $("#image").prop("naturalWidth");
            imageHeight = $("#image").prop("naturalHeight");
            // console.log("width and height of natural",$("#image").prop("naturalWidth"),$("#image").prop("naturalHeight"));

            // ctx_bottom.clearRect(0,0,canvas.scrollWidth,canvas.scrollHeight/2);
            reset();
            if (imageWidth>imageHeight){

                widthDrawImage = canvas.width;
                heightDrawImage = imageHeight/imageWidth*canvas.height;

            }else {
                widthDrawImage = imageWidth/imageHeight*canvas.width;
                heightDrawImage = canvas.height;

            }

            ctx_bottom.drawImage(image, 0, 0, imageWidth, imageHeight, move_x, move_y,widthDrawImage,heightDrawImage);

            ctx.fillStyle = 'rgba(0, 0, 0, 0.7)';
            ctx.clearRect(0,0,canvas.width,canvas.height);
            ctx.fillRect(0,0,canvas.width,canvas.height);
            ctx.clearRect(0,0,size*2,size*2);
            reload();
            drawShowImage();

        };

        imageShow.appendChild(img);


    }



    $("input[type=file]").change(function () {
        formName = $(this.form);
        var file = document.getElementById($(this).attr('id'));
        var ext=file.value.substring(file.value.lastIndexOf(".")+1).toLowerCase();

        if(ext!='png'&&ext!='jpg'&&ext!='jpeg'&&ext!="gif") {
            alert("图片的格式必须为png或者jpg或者jpeg格式或者gif！");
            file.value = '';
            return;
        }

        if(/msie ([^;]+)/.test(ua)) {
            var lowIE10 = RegExp["$1"]*1;
            if(lowIE10 == 6){
                // IE6浏览器设置img的src为本地路径可以直接显示图片
                file.select();
                // 在file控件下获取焦点情况下 document.selection.createRange() 将会拒绝访问，所以我们要失去下焦点。
                file.blur();

                var reallocalpath = document.selection.createRange().text;
                pic.src = reallocalpath;
            }else if(lowIE10 < 10){
                // IE7~9 IE10+按照html5的标准去处理
                file.select();
                // 在file控件下获取焦点情况下 document.selection.createRange() 将会拒绝访问，所以我们要失去下焦点。
                file.blur();
                var reallocalpath = document.selection.createRange().text;
                // 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
                pic.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
                // 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
                pic.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
            }else if(lowIE10 >= 10) {
                html5Reader(file);
            }
        }else {
            html5Reader(file);
        }
        // EventUtil.addHandler(picInput,"change")

    });


    canvas.onmousedown = function () {

        canvas.onmousemove = function(e){
            x= e.offsetX/2;
            y= e.offsetY/2;

            ctx.fillStyle = 'rgba(0, 0, 0, 0.7)';


            ctx.clearRect(0,0,canvas.width,canvas.height);
            ctx.fillRect(0,0,canvas.width,canvas.height);



            if (x+size>canvas.width){
                x = canvas.width-size;
            }

            if (y+size>canvas.height) {
                y = canvas.height-size;
            }


            if (size>x){
                x = size;
            }

            if (size>y){
                y = size;
            }


            ctx.clearRect(x-size,y-size,size*2,size*2);

            drawShowImage();

        };

        canvas.onmouseup = function(){
            canvas.onmousemove = null;
            canvas.onmouseup = null;
        };

    };


    var drawShowImage = function () {

        var times = imageWidth / widthDrawImage;

        var from_x = (x-size-move_x)*times;
        var from_y = (y-size-move_y*2)*times;

        var image = document.getElementById('image');
        ctx_show.clearRect(0,0,canvas_show.width,canvas_show.height);

        ctx_show.drawImage(image,from_x,from_y,size*times*2,size*times*2,0,0,canvas_show.width,canvas_show.height);

    };

    $("#grand").on('click',function () {
        if((size+10)*2>canvas.width){
            ctx.fillStyle = 'rgba(0, 0, 0, 0.7)';

            ctx.clearRect(0,0,canvas.width,canvas.height);
            ctx.fillRect(0,0,canvas.width,canvas.height);

            ctx.clearRect(0,0,size*2,size*2);
        }else{
            size = size+10;
            reload();
        }

        drawShowImage();

    });

    $("#min").on("click",function () {
        size = (size-10)>0?(size-10):size;
        reload();
        drawShowImage();

    });


    $("#pic-plus").on("click",function () {
        ctx_bottom.clearRect(0,0,canvas.width,canvas.height);
        widthDrawImage = (1+magicX) * widthDrawImage;
        heightDrawImage = heightDrawImage*(1+magicX);
        ctx_bottom.drawImage(image, 0, 0, imageWidth, imageHeight, move_x, move_y, widthDrawImage, heightDrawImage);
        drawShowImage();
    });

    $("#pic-moins").on("click",function () {
        ctx_bottom.clearRect(0,0,canvas.width,canvas.height);

        widthDrawImage = widthDrawImage*(1-magicX);
        heightDrawImage = (1-magicX)* heightDrawImage;
        ctx_bottom.drawImage(image, 0, 0, imageWidth, imageHeight, move_x, move_y, widthDrawImage, heightDrawImage);
        drawShowImage();

    });


    var reload = function() {

        ctx.fillStyle = 'rgba(0, 0, 0, 0.7)';

        //caculate
        // ctx.drawImage(image,0,0,300,300);

        ctx.clearRect(0,0,canvas.width,canvas.height);
        ctx.fillRect(0,0,canvas.width,canvas.height);


        if (x+size>canvas.width){
            x = canvas.width-size;
        }

        if (y+size>canvas.height) {
            y = canvas.height-size;
        }


        if (size>x){
            x = size;
        }

        if (size>y){
            y = size;
        }


        ctx.clearRect(x-size,y-size,size*2,size*2);

    };



    $("#right").on("click",function () {
        var image = document.getElementById("image");
        move_x = move_x + move_step;
        ctx_bottom.clearRect(0,0,canvas.width,canvas.height);
        ctx_bottom.drawImage(image, 0, 0, imageWidth, imageHeight, move_x, move_y, widthDrawImage, heightDrawImage);
        drawShowImage();


    });

    $("#left").on("click",function () {
        var image = document.getElementById("image");
        move_x = move_x - move_step;
        ctx_bottom.clearRect(0,0,canvas.width,canvas.height);
        ctx_bottom.drawImage(image, 0, 0, imageWidth, imageHeight, move_x, move_y, widthDrawImage, heightDrawImage);
        drawShowImage();

    });

    $("#up").on("click",function () {
        var image = document.getElementById("image");
        move_y = move_y - move_step;
        ctx_bottom.clearRect(0,0,canvas.width,canvas.height);
        ctx_bottom.drawImage(image, 0, 0, imageWidth, imageHeight, move_x, move_y, widthDrawImage, heightDrawImage);
        drawShowImage();


    });

    $("#down").on("click",function () {
        var image = document.getElementById("image");
        move_y = move_y + move_step;
        ctx_bottom.clearRect(0,0,canvas.width,canvas.height);
        ctx_bottom.drawImage(image, 0, 0, imageWidth, imageHeight, move_x,move_y,widthDrawImage, heightDrawImage);
        drawShowImage();
    });


    $("#cut").on("click",function () {
        var strDataURI = canvas_show.toDataURL();
        if (!$("#imageUpload").length){
            //todo
            var str = $("input[type=file]").attr("name");
            var n = str.indexOf("[")+1;
            var m = str.indexOf("]");
            var temp = str.slice(n,m);
            var fin = str.replace(temp,"image");
            var input = $("<input />").attr("name",fin).attr("id","imageUpload");
            if (input===null||formName===null){
                alert("请选择图片");
                return;
            }
            formName.append(input);
        }

        $("#imageUpload").val(strDataURI);

        alert("图片剪裁成功");

    });
})(window.jQuery);

