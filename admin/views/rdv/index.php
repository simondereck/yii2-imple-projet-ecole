<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 06/12/2019
 * Time: 16:50
 */
?>

<div class="rdv" id="rdv">
</div>

<script type="text/javascript">
    class RdvClass {
        initLangue() {
            this.langues = {
                title:"日 历",
                today:"今 天",
                create:"创建",
                popWindowTitle:"添加标题",
                popWindowPerson:"添加老师",
                popWindowLocation:"添加会议",
                popWindowInfo:"添加说明",
                noticeInfo:"不能约之前的日期",
                calenderTitle:['Sun.','Mon.','Tue.','Wed.','Thu.','Fri.','Sat.'],
                hours:['0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23']
            };

            this.langues_fr = {
                title:"Caleadar",
                today:"Today",
                create:"Create",
                popWindowTitle:"Add Title",
                noticeInfo:"Can't make rdv before now",
                calenderTitle:['Sun.','Mon.','Tue.','Wed.','Thu.','Fri.','Sat.'],
                hours:['0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23']
            }
        }

        initData(){
            this.data = {
                max_year:2030,
                max_month:12,
                min_year:2019,
                min_month:1,
                nex:true,
                pre:false,
                year:new Date().getFullYear(),
                month:new Date().getMonth()+1,
                day:new Date().getDate(),
                w:new Date().getDay(),
                calenderTitle:'',
                topBarTitle:'',
                days:[],
                selected:null,
                flash:true,
                current_year:0,
                current_month:0,
                select_Year:null,
                select_month:null,
                select_day:null,
                $year:null,
                $month:null,
                $day:null,
                $active:null,
                $block:null,
                height:null,
                pluginCalender:"",
                rightContent:"",
                weekArray:[],
                selectDate:null,
            };

        }


        constructor(){
            let self = this;
            this.initLangue();
            this.initData();
            var year = this.data.year;
            var month = this.data.month;
            this.data.current_year = this.data.select_Year = year;
            this.data.current_month = this.data.select_month = month;
            this.data.select_day = this.data.day;
            this.data.calenderTitle = this.formatTimeString(this.data.current_year, this.data.current_month);
            // this.data.callback = callback;

            $('#rdv').on('click','.menu',function () {
                $(".rdv-left-bar").animate({width: 'toggle'});
            });

            $('#rdv').on('click','.add-rdv',function () {
                //add pop window
                self.popWindowforRdv();
            });


            $('#rdv').on('click','.pre',function () {
                self.pre();
            });

            $('#rdv').on('click','.next',function () {
                self.next();
            });
            $('#rdv').on('click','.rdv-plugin-calender-item',function () {
                let key = $(this).attr('data-key');
                let i = parseInt(key/7);
                let selectDays = self.data.weekArray[i];
                let selectDaysItems = "";
                self.data.selectDate = selectDays;
                //TODO set selected days on top
                selectDays.forEach(function (value,key) {
                    selectDaysItems += '<div>'+value.day+'</div>';
                });
                $('.rdv-plugin-calender-content-subtitle').empty();
                $('.rdv-plugin-calender-content-subtitle').append(selectDaysItems).show('toggle');

            });


            $('#rdv').on('click','.rdv-map-item',function () {
               let hour = $(this).attr('data-hour');
               let key = $(this).attr('data-key');
               self.data.hour = hour;
               self.data.key = key;
                self.popWindowforRdv();
            });

            $('body').on('click','.prend-rdv-button',function () {
               let dataArray = $('#prend-rdv').serializeArray();
               let flag = true;
               let dataUploadArray = {};
               dataArray.forEach(function (val,ke) {
                   if (val.name==='person'){
                        if(!self.checkEmail(val.value)){
                            alert("you should input an email");
                            flag = false;
                            return;
                        }
                   }
                   dataUploadArray[val.name] = val.value;
               });

               if (flag === true){
                   console.log(dataUploadArray);
                   $.post( "index.php?r=rdv/upload",dataUploadArray ,function( data ) {
                        console.log(data);
                        if (data.status === 1) {
                            $('.pop-create-rdv').hide();
                        }else{
                            alert(data.message);
                        }
                   });
               }
            });
        }


        show(){
            $('#rdv').empty();
            let topBar = '<div class="rdv-top-bar">' +
                    '<div class="rdv-top-bar-content">'+
                        '<div class="menu"><img src="../../images/rdv/menu.png" /></div>'+
                        '<div class="rdv-calendar-title">' +
                            '<div><img src="../../images/rdv/calendar.png" /></div>'+
                            '<label>' + this.langues.title+'</label>'+
                        '</div>'+
                        '<button class="rdv-today">'+this.langues.today+'</button>'+
                        '<div>' +
                            '<button class="pre"><</button>'+
                            '<label class="rdv-top-day-title">'+this.data.calenderTitle+'</label>'+
                            '<button class="next">></button>'+
                        '</div>'+
                    '</div>'+
                '</div>';

            this.setPluginCalendar();

            let leftBar = '<div class="rdv-left-bar">' +
                    '<div class="add-rdv">' +
                        '<img src="../../images/rdv/add.png" />' +
                        '<label>'+this.langues.create+'</label>'+
                    '</div>'+
                    '<div class="rdv-plugin-calender">' +
                        '<div class="rdv-plugin-calender-title">' +
                            '<div class="rdv-plugin-calender-title-buttons">' +
                                '<button class="pre"><</button>'+
                                '<label>'+this.data.calenderTitle+'</label>' +
                                '<button class="next">></button>'+
                            '</div>'+
                        '</div>'+
                        this.data.pluginCalender+
                    '</div>'+
                '</div>';

            this.setRightContent();

            let rdvContent = '<div>' +
                    topBar+
                    '<div class="rdv-content">'+
                        leftBar+
                        this.data.rightContent+
                    '</div>'+
                '</div>';
            $('#rdv').append(rdvContent).show('slow');


            let i =  Math.ceil(
                (this.data.day + 6 - this.data.w) / 7
            )-1;

            let selectDays = this.data.weekArray[i];
            this.data.selectDate = selectDays;
            let selectDaysItems = "";
            selectDays.forEach(function (value,key) {
                selectDaysItems += '<div>'+value.day+'</div>';
            });


            $('.rdv-plugin-calender-content-subtitle').empty();
            $('.rdv-plugin-calender-content-subtitle').append(selectDaysItems).show('toggle');

            // $('.rdv-top-day-title').empty();
            // $('.rdv-top-day-title').append(this.data.topBarTitle).show('toggle');


        }

        setPluginCalendar(){
            let calenderTitleDiv = '<div class="rdv-plugin-calender-content-title">';
            this.langues.calenderTitle.forEach(function (value) {
                calenderTitleDiv += '<div>'+value+'</div>';
            });
            calenderTitleDiv += '</div>';
            this.setDays(this.data.current_year,this.data.current_month);
            let calenderBodyDiv = '<div class="rdv-plugin-calender-content-body">';
            this.data.days.forEach(function (day,key) {
                if (key%7===0){
                    calenderBodyDiv += '<div class="rdv-plugin-calender-content-body-div">';
                    calenderBodyDiv += '<div class="rdv-plugin-calender-item" style="color:'+day.color+';" data-key="'+key+'">' +
                        day.day+
                        '</div>';
                } else if(key%7===6){
                    calenderBodyDiv += '<div class="rdv-plugin-calender-item" style="color:'+day.color+';" data-key="'+key+'">' +
                        day.day+
                        '</div>';
                    calenderBodyDiv += '</div>';
                }else{
                    calenderBodyDiv += '<div class="rdv-plugin-calender-item" style="color:'+day.color+';" data-key="'+key+'">' +
                        day.day+
                        '</div>';
                }
            });
            calenderBodyDiv += '</div>';
            this.data.pluginCalender = '<div class="rdv-plugin-calender-content">'+
                    calenderTitleDiv +
                    calenderBodyDiv +
                '</div>';

        }

        setRightContent(){

            let self = this;
            let rightContentTitle = '<div class="rdv-plugin-calender-content-title non-background">';
            this.langues.calenderTitle.forEach(function (value) {
                rightContentTitle += '<div>'+value+'</div>';
            });
            rightContentTitle += '</div>';

            let rightContentSubTitle = '<div class="rdv-plugin-calender-content-subtitle non-background"></div>';

            let leftHourlist = '<div class="rdv-plugin-calender-hours-list">';
            let rightHourMap = '<div class="rdv-plugin-calender-hours-map">';

            this.langues.hours.forEach(function (value) {
                leftHourlist += '<div>'+value+'</div>';
                rightHourMap += '<div class="rdv-plugin-hours-map-item" data-hour="'+value+'">' +
                        '<div class="rdv-map-item" data-hour="'+value+'" data-key="0"></div>'+
                        '<div class="rdv-map-item" data-hour="'+value+'" data-key="1"></div>'+
                        '<div class="rdv-map-item" data-hour="'+value+'" data-key="2"></div>'+
                        '<div class="rdv-map-item" data-hour="'+value+'" data-key="3"></div>'+
                        '<div class="rdv-map-item" data-hour="'+value+'" data-key="4"></div>'+
                        '<div class="rdv-map-item" data-hour="'+value+'" data-key="5"></div>'+
                        '<div class="rdv-map-item" data-hour="'+value+'" data-key="6"></div>'+
                    '</div>';
            });
            leftHourlist += '</div>';

            let hoursContents = '<div class="rdv-plugin-calender-hours-content">' +
                    leftHourlist+
                    rightHourMap+
                '</div>';
            let rightContent = '<div class="rdv-right-bar">' +
                    rightContentTitle+
                    rightContentSubTitle+
                    hoursContents+
                '</div>';
            this.data.rightContent = rightContent;

        }

        setDays (year, month) {
            let self = this;
            const empty_days_count = new Date(year, month - 1, 1).getDay(); // 本月第一天是周几，0是星期日，6是星期六
            let empty_days = [];
            const prev_month = month - 1 === 0 ? 12 : month - 1;             // 上个月的月份数
            const prev_year = month - 1 === 0 ? this.data.year - 1 : this.data.year;
            const prev_last_day = new Date(prev_year,prev_month,0);
            let prev_days_count = prev_last_day.getDate();              // 本月最后一天是几号

            /**
             * 上个月的日期
             */
            for (let i = 0; i < empty_days_count; i++) {
                empty_days.push({
                    day: prev_days_count-empty_days_count+i+1,
                    month: prev_month,
                    year: prev_year,
                    info: 'prev',
                    color: '#c3c6d1',
                    background: 'transparent',
                    cmpr: this.formatTimeStringCmpr(prev_year, prev_month, prev_days_count - empty_days_count + i + 1)
                });
            }

            /**
             * 下个月的日期
             */
            const last_day = new Date(year, month, 0);          // 本月最后一天
            const days_count = last_day.getDate();              // 本月最后一天是几号
            const last_date = last_day.getDay();                // 本月最后一天是星期几
            const next_month = month + 1 === 13 ? 1 : month + 1; // 下个月的月份数
            const next_year = month + 1 === 13 ? this.data.year + 1 : this.data.year;

            let empty_days_last = [];
            for (let i = 0; i < 6 - last_date; i++) {
                empty_days_last.push({
                    day: i+1,
                    month: next_month,
                    year: next_year,
                    info: 'next',
                    color: '#c3c6d1',
                    background: 'transparent',
                    cmpr: this.formatTimeStringCmpr(next_year, next_month, i+1)
                });
            }


            let temp = [];
            for (let i = 1; i <= days_count; i++) {
                temp.push({
                    day: i,
                    month: month,
                    year: year,
                    info: 'current',
                    color: '#4a4f74',
                    background: 'transparent',
                    cmpr: this.formatTimeStringCmpr(year, month, i)
                });
            }

            // var days_range = temp;                                   // 本月
            let days = empty_days.concat(temp, empty_days_last); // 上个月 + 本月 + 下个月
            this.data.days = days;

            let i = -1;
            this.data.days.forEach(function (value,key) {
                if (key%7===0){
                    i++;
                    self.data.weekArray[i] = new Array();
                }
                self.data.weekArray[i][key%7] = value;
            });
        }

        next () {
            let flag = true;
            if(this.data.current_year>this.data.year){
                if(this.data.current_month+12 - this.data.month>5){
                    flag = false;
                }
            }else{
                if(this.data.current_month-this.data.month>5){
                    flag = false;
                }
            }

            if(flag === false){
                alert("we can't keep a rdv in half year!");
                return;
            }

            const next_month = this.data.current_month + 1 === 13 ? 1 : this.data.current_month + 1; // 下个月的月份数
            const next_year = this.data.current_month + 1 === 13 ? this.data.current_year + 1 : this.data.current_year;
            this.data.calenderTitle = this.formatTimeString(next_year, next_month);
            this.data.current_year = next_year;
            this.data.current_month = next_month;
            this.setDays(next_year,next_month);
            this.show();
        }

        pre () {
            const prev_month = this.data.current_month - 1 === 0 ? 12 : this.data.current_month - 1; // 下个月的月份数
            const prev_year = this.data.current_month - 1 === 0 ? this.data.current_year - 1 : this.data.current_year;
            this.data.calenderTitle = this.formatTimeString(prev_year, prev_month);
            this.data.current_year = prev_year;
            this.data.current_month = prev_month;
            this.setDays(prev_year, prev_month);
            this.show();
        }

        formatNumber(n) {
            n = n.toString();
            return n[1] ? n : '0' + n;
        }
        formatTimeString(year,month){
            return [year,month].map(this.formatNumber).join('-');
        }

        formatTimeStringCmpr(year,month,day){
            return [year,month,day].map(this.formatNumber).join('');
        }
        formatDate(year,month,day){
            return [year,month,day].map(this.formatNumber).join('-');
        }

        popWindowforRdv(type){
            let $popWindow = '<div class="pop-create-rdv">' +
                    '<div class="pop-window-rdv">' +
                        '<div class="pop-window-rdv-close"><text>x</text></div>'+
                        '<div>' +
                            '<form id="prend-rdv">' +
                                '<div class="pop-window-rdv-title"><input name="rdv-title" placeholder="'+this.langues.popWindowTitle+'" /></div>'+
                                '<div class="pop-window-rdv-body">' +
                                        '<div class="pop-window-rdv-item inline-input">' +
                                            '<img src="../../images/rdv/time.png" />' +
                                            '<input name="sdate" /><input name="stime"/>-<input name="edate"/><input name="etime"/>'+
                                        '</div>'+
                                        '<div class="pop-window-rdv-item">' +
                                            '<img src="../../images/rdv/personne.png" />' +
                                            '<input placeholder="'+this.langues.popWindowPerson+'" name="person"/>'+
                                        '</div>'+
                                        '<div class="pop-window-rdv-item">' +
                                            '<img src="../../images/rdv/location.png" />' +
                                            '<input placeholder="'+this.langues.popWindowLocation+'" name="location"/>'+
                                        '</div>'+
                                        '<div class="pop-window-rdv-item">' +
                                            '<img src="../../images/rdv/description.png" />' +
                                            '<textarea placeholder="'+this.langues.popWindowInfo+'" name="description"></textarea>'+
                                        '</div>'+
                                        '<div class="pop-window-rdv-item rdv-button">' +
                                            '<button class="prend-rdv-button" type="button">保存</button>'+
                                        '</div>'+
                                '</div>'+
                            '</form>'+
                        '</div>'+
                    '</div>'+
                '</div>';

            $('body').append($popWindow).show('toggle');

            $('body').on('click','.pop-window-rdv-close',function () {
                $('.pop-create-rdv').hide();
            });



            let hour = this.data.hour;
            let key = this.data.key;
            console.log(this.data.selectDate,key,hour);
            let day = this.data.selectDate[key];
            let dayString = this.formatDate(day.year,day.month,day.day);
            $("input[name=sdate]").val(dayString);
            $("input[name=edate]").val(dayString);
            $("input[name=stime]").val(this.formatNumber(hour)+":00");
            $("input[name=etime]").val(this.formatNumber(parseInt(hour)+1)+":00");

        }

        checkEmail(email){
            var reg = /^\w+((.\w+)|(-\w+))@[A-Za-z0-9]+((.|-)[A-Za-z0-9]+).[A-Za-z0-9]+$/; //正则表达式
            if(email === ""){ //输入不能为空
                return false;
            }else if(!reg.test(email)){ //正则验证不通过，格式不对
                return false;
            }else{
                return true;
            }
        }

    }

    let rdvObj = new RdvClass();
    rdvObj.show();

</script>
<style>
    .rdv{
        width: 100%;
        height: 100%;
    }

    .rdv-top-bar{
        width: 100%;
        border-bottom: 1px solid whitesmoke;
    }

    .rdv-top-bar-content{
        width: 50%;
        height: 4.5vw;
        font-size: 1.75vw;
        font-weight: bold;
        padding: 0.75vw;
        display: flex;
        justify-content: space-around;
        background-color: white;
        line-height: 3vw;
    }
    .rdv-top-bar button{
        font-size: 15px;

    }

    .rdv-top-bar .rdv-today{
        font-weight: normal;
        background-color: transparent;
        border-radius: 3px;
        border: 1px solid whitesmoke;
    }

    .rdv-today:hover {
        background-color: rgba(0,0,0,0.2);
    }

    .rdv-content{
        display: flex;
    }

    .rdv-left-bar{
        width: 28vw;
        border-right: 1px solid whitesmoke;
    }


    .rdv-right-bar{
        width: 100%;
    }


    .rdv-top-bar .pre,.rdv-top-bar .next{
        border: none;
        background-color: transparent;
        font-weight: normal;
        font-size: 20px;
    }

    .rdv .pre:hover,.rdv .next:hover{
        color: #00a0e9;
    }


    .rdv-top-bar .menu {
        border-radius: 3vw;
        width: 3vw;
        height: 3vw;
        text-align: center;
    }

    .rdv-top-bar .menu:hover{
        background-color: rgba(0,0,0,0.2);
    }

    .rdv-top-bar img{
        width: 1.5vw;
        height: 1.5vw;
    }

    .rdv-calendar-title{
        display: flex;
    }

    .rdv-calendar-title img{
        margin-right: 1vw;
        height: 2vw;
        width: 2vw;
    }

    .add-rdv{
        display: flex;
        justify-content: space-evenly;
        height: 3vw;
        line-height: 3vw;
        font-size: 1.5vw;
        width: 10vw;
        margin: 2vw auto 2vw;
        border-radius: 3vw;
        position: relative;
        box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.2);
        text-align: center;
    }

    .add-rdv img{
        width: 2vw;
        height: 2vw;
        margin-top: 0.5vw;
    }

    .add-rdv:hover{
        box-shadow: 0px 0px 10px 2px rgba(0,0,0,0.2);
        background-color: rgba(0,0,0,0.2);
    }



    .rdv-plugin-calender-title{
        display: flex;
        text-align: center;
        font-size: 1vw;
        font-weight: bold;
        align-items: center;
        height: 3vw;
        border-bottom: 1px solid whitesmoke;
        justify-content: center;
    }

    .rdv-plugin-calender-title label{
        line-height: 3vw;
        height: 3vw;
        margin-bottom: 0;
        font-weight: bolder;
    }

    .rdv-plugin-calender-title-buttons{
        display: flex;
    }

    .rdv-plugin-calender-title button{
        background-color: transparent;
        border: none;
    }

    .rdv-plugin-calender-content-title{
        display: flex;
        justify-content: space-around;
        background-color: whitesmoke;
    }

    .rdv-plugin-calender-content-title div{
        font-weight: bolder;
        color: darkgray;
        width: 4vw;
        text-align: center;
        overflow: hidden;
    }


    .rdv-plugin-calender-content-body-div{
        display: flex;
    }

    .rdv-plugin-calender-item{
        width: 3vw;
        height: 3vw;
        text-align: center;
        margin: 0.5vw;
        border-radius: 3vw;
        line-height: 3vw;
    }


    .rdv-plugin-calender-item:hover{
        box-shadow: 0px 0px 5px 2px rgba(0,0,0,0.3);
        background-color: deepskyblue;
        cursor: pointer;
    }


    .non-background{
        background: transparent;
    }


    .rdv-plugin-calender-content-subtitle{
        display: flex;
        justify-content: space-around;
    }

    .rdv-plugin-calender-content-subtitle div{
        font-size: 1.25vw;
        font-weight: bolder;
        color: darkgray;
        width: 4vw;
        height: 4vw;
        border-radius: 4vw;
        text-align: center;
        line-height: 4vw;
    }

    .rdv-plugin-calender-content-subtitle div:hover{
        cursor: pointer;
        background-color: whitesmoke;
    }


    .rdv-plugin-calender-hours-content{
        max-height: 60vh;
        overflow-y: scroll;
        display: flex;
    }



    .rdv-plugin-calender-hours-list{
        width: 2vw;
        text-align: center;
    }

    .rdv-plugin-calender-hours-list div{
        height: 4vw;
        line-height: 4vw;
    }

    .rdv-plugin-calender-hours-map{
        width: 100%;
    }


    .rdv-plugin-calender-hours-map div:nth-child(2n){

    }


    .rdv-plugin-hours-map-item{
        height: 4vw;

        display: flex;
        justify-content: space-around;
        border-bottom: 1px solid rgba(0,0,0,0.2);
    }


    .rdv-plugin-hours-map-item div{
        width: 9.5vw;
        height: 4vw;
        border-right: 1px solid rgba(0,0,0,0.2);
    }

    .pop-create-rdv{
        position: absolute;
        background: rgba(0,0,0,0.3);
        width: 100vw;
        height: 100%;
        top: 0;
        z-index: 200;
    }

    .pop-window-rdv{
        background: white;
        min-width: 280px;
        width: 40vw;
        position: relative;
        top: 20px;
        margin: 20vh auto 20px;
        padding: 1vw;
        border-radius: 5px;
        box-shadow: 0px 0px 5px 2px rgba(0,0,0,0.3);
    }

    .pop-window-rdv-close{
        text-align: right;
    }

    .pop-window-rdv-close text{
        display: inline-block;
        width: 2.5vw;
        height: 2.5vw;
        border-radius: 2.5vw;
        text-align: center;
        line-height: 2.5vw;
        font-size: 1.7vw;
    }

    .pop-window-rdv-close text:hover{
        background: whitesmoke;
        cursor: pointer;
    }

    .pop-window-rdv-item img{
        width: 1.5vw;
        height: 1.5vw;
        margin: 1vw;
    }

    .pop-window-rdv-item input,textarea{
        width: 32vw;
        border:none;
        border-bottom: 1px solid rgba(0,0,0,0.2);
    }

    .pop-window-rdv-item input:focus,
    textarea:focus,
    .pop-window-rdv-title input:focus{
        background-color: whitesmoke;
        outline: none;
        border-bottom: 1px solid dodgerblue;
    }

    .inline-input input{
        width: 7vw;
        margin-right: 1vw;
        font-size: 1vw;
        text-align: center;
    }

    :focus{
        outline: none;
    }


    .pop-window-rdv-title input{
        width: 80%;
        margin-left: 4vw;
        border:none;
        border-bottom: 1px solid rgba(0,0,0,0.2);
        font-size: 2.5vw;
        font-size: 1vw;
        padding: 2px;
    }

    .pop-window-rdv-title input:focus{
        border:none;
        border-bottom: 1px solid dodgerblue;
    }

    ::placeholder{
        color: rgba(0,0,0,0.3);
    }

    .rdv-button{
        text-align: right;
        /*margin-right: 30px;*/
    }

    .rdv-button button{
        background-color: dodgerblue;
        color: white;
        margin-right: 30px;
        padding: 6px;
        font-size: 1.25vw;
        border: none;
        border-radius: 2px;
        min-width: 80px;
    }


</style>

