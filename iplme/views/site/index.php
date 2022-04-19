<?php

/* @var $this yii\web\View */
$this->title = 'IPLME';
?>
<div class="top-bar-img">
    <?php if ($datas){ ?>
        <div class="swiper-container">
            <div class="swiper-wrapper">
            <?php foreach ($datas as $data){ ?>
                <div class="swiper-slide" data-src="<?php echo $data->path;?>">
                    <div class="swiper-pic" >
                        <img src="<?php echo $data->path;?>" />
                    </div>
                </div>
            <?php
                }
            ?>
            </div>
            <div class="swiper-pagination swiper-pagination-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
            <div class="swiper-button-next swiper-button-white"></div>
        </div>
    <?php }else{ ?>
        <img src="../../uploads/swiper/swiper.gif"/>
    <?php }?>
    <div class="down"><a href="#formations">voir les formations<label class="glyphicon glyphicon-arrow-down" ></label></a></div>

</div>

<div class="site-index" id="formations">

    <div class="programmes">
        <h2>Formation</h2>
        <div class="programes-sets">
            <div class="programme-item" data-val="bba">
                <img src="../../images/programe/bba.jpg"/>
                <div class="programme-item-name">BBA</div>
            </div>
            <div class="programme-item" data-val="mba">
                <img src="../../images/programe/mba.jpg"/>
                <div class="programme-item-name">MBA</div>
            </div>
            <div class="programme-item" data-val="dba">
                <img src="../../images/programe/dba.jpg"/>
                <div class="programme-item-name">DBA</div>
            </div>
<!--            <div class="programme-item" data-val="stage">-->
<!--                <img src="../../images/programe/stage.jpg"/>-->
<!--                <div class="programme-item-name">STAGE</div>-->
<!--            </div>-->
            <div class="programme-item" data-val="fle">
                <img src="../../images/programe/fle.jpg"/>
                <div class="programme-item-name">FLE</div>
            </div>
<!--            <div class="programme-item" data-val="prepa">-->
<!--                <img src="../../images/programe/prepa.jpg"/>-->
<!--                <div class="programme-item-name">PREPA</div>-->
<!--            </div>-->
<!--            <div class="programme-item" data-val="ete">-->
<!--                <img src="../../images/programe/cours_ete.jpg"/>-->
<!--                <div class="programme-item-name">COURS D'ÉTÉ</div>-->
<!--            </div>-->
<!--            <div class="programme-item" data-val="gymnase">-->
<!--                <img src="../../images/programe/gymnase.jpg"/>-->
<!--                <div class="programme-item-name">GYMNASE</div>-->
<!--            </div>-->
<!--            <div class="programme-item" data-val="cvec">-->
<!--                <img src="../../images/programe/cvec.jpg"/>-->
<!--                <div class="programme-item-name">CVEC</div>-->
<!--            </div>-->
        </div>
    </div>
</div>
<script>
    $('.programmes').on('click','.programme-item',function () {
       let val = $(this).attr('data-val');
       if(val==="cvec"){
           window.location = "https://www.messervices.etudiant.gouv.fr/envole/";
       }else{
           window.location = 'index.php?r=programe/'+val;
       }
    });

</script>
<style>
    body {
        background: whitesmoke;
    }


    .swiper-container {
        width: 100%;
        height: 100%;
        background: #000;
    }


    .programmes{
        background: white;
        margin: 20px auto 10vw;
        width: 100%;

    }

    .programmes h2{
        width: fit-content;
        margin: 2vw auto 2vw;
        color: #1b6d85;
        padding: 10px;
        border-bottom: 3px solid black ;
    }


    .col-lg-4 p{
        width: 200px;
        margin: auto;
        margin-bottom: 10px;
    }

    .col-lg-4 img{
        width: 80px;
        height: 80px;
    }


    .wrap > .container {
        padding: 50px 0px 0px;
    }
    .programes-sets{
        display: flex;
        justify-content: space-between;
    }

    .programme-item{
        width: 22vw;
        height: 16vw;
        display: inline-block;
        text-align: center;
        margin: 1vw 1.3vw 1vw;
        background-color: cadetblue;
        position: relative;
        box-shadow: 0px 0px 2px 1px rgba(0, 0, 0, .2);
        overflow: hidden;
    }

    .programme-item img{
        width: 24vw;
        height: 16vw;
        transition: transform .5s ease;
    }

    .programme-item-name{
        top: 0px;
        position: absolute;
        color: white;
        width: 24vw;
        height: 16vw;
        background-color: rgba(0,0,0,0.2);
        line-height: 16vw;
        text-align: center;
        z-index: 200;
        font-size: 1vw;
    }


    .programme-item:hover{
        box-shadow: 2px 2px 4px 1px rgba(0, 0, 0, 0.5);
        cursor: pointer;
    }

    .programme-item:hover .programme-item-name{
        background-color: rgba(0,0,0,0.5);
    }

    .programme-item:hover img{
        transform: scale(1.5);
    }

    .programme-item-name:hover {
        font-size: 1.5vw;
        /*animation: ;*/
    }


    @media (min-width: 768px){
        .container {
            width: 100%;
        }
        .top-bar-img,.top-bar-img img{
            width: 100%;
            height: 100vh;
        }

    }

    img{
        object-fit: cover;
    }

    @media (max-width: 767px) {

        .wrap > .container {
            padding: 50px 0px 0px;
        }

        .container {
            width: 100%;
        }

        .top-bar-img,.top-bar-img img{
            width: 100vw;
            height: 40vh;
        }
        h2{
            margin: auto;
        }


        .programmes{
            background: white;
            width: 100vw;
        }


        .programme-item{
            width:80vw;
            height: 35vw;
            display: inline-flex;
            text-align: center;
            margin: 1vw 10vw 1vw;
        }

        .programme-item img{
            width: 80vw;
            height: 35vh;
        }


        .programme-item-name{
            top: 0px;
            position: absolute;
            color: white;
            width: 80vw;
            height: 35vw;
            background-color: rgba(0,0,0,0.5);
            line-height:35vw;
            text-align: center;
            z-index: 200;
            font-size: 3vw;
        }

    }

    @media (min-width: 970px) {
        .programmes-content{
            width: 970px;
            margin: auto;
        }
    }



    @media screen and (min-width:600px ){
        .swiper-slide {
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            font-size: 18px;
            color:#fff;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px 20px;
        }
        .parallax-bg {
            position: absolute;
            left: 0;
            top: 0;
            width: 130%;
            height: 100%;
            -webkit-background-size: cover;
            background-size: cover;
            background-position: center;
        }

        .swiper-slide > div{
            margin-bottom: 20px;
        }

        .swiper-slide > div >div{
            margin-bottom: 20px;
        }
        .swiper-slide .title {
            max-width: 500px;
            font-size: 41px;
            font-weight: 300;
        }
        .swiper-slide .subtitle {
            max-width: 500px;
            font-size: 21px;
        }
        .swiper-slide .text {
            font-size: 16px;
            max-width: 500px;
            line-height: 2.0;
        }

        .swiper-pic{
            width: 100%;
        }
        .swiper-pic>img{
            width: 100%;
        }
        .swiper-slide a{
            font-size: 14px;
            color: white;
            text-align: center;
            margin-left: 300px;
        }

        .swiper-slide{
            display: inline-flex;
        }

    }

    @media screen and (max-width: 600px){
        .swiper-slide {
            min-height: 430px;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            font-size: 18px;
            color:#fff;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 40px 60px;
        }
        .parallax-bg {
            position: absolute;
            left: 0;
            top: 0;
            width: 130%;
            height: 100%;
            -webkit-background-size: cover;
            background-size: cover;
            background-position: center;
        }
        .swiper-slide > div{
            margin-bottom: 10px;
        }

        .swiper-slide > div >div{
            margin-bottom: 10px;
        }
        .swiper-slide .title {
            max-width: 500px;
            font-size: 24px;
            font-weight: 300;
        }
        .swiper-slide .subtitle {
            max-width: 500px;
            font-size: 18px;
        }
        .swiper-slide .text {
            font-size: 14px;
            max-width: 500px;
            line-height: 1.3;
        }

        .swiper-pic{
            width: 100%;
        }
        .swiper-pic>img{
            width: 100%;
            max-height: 200px;
        }
        .swiper-slide a{
            font-size: 14px;
            color: white;
            text-align: center;
            margin-left: 300px;
        }
    }

    .swiper-slide :hover{
        cursor: pointer;
    }

    .down{
        height:200px;
        position: relative;
        bottom: 200px;
        line-height: 200px;
        text-align: right;
        margin-top: 20px;
        font-size: 20px;
        z-index: 20000;
        /*background-color: rgba(0,0,0,0.3);*/
        color: white;
        padding: 10px;
    }

    .down a{
        margin-right: 20px;
    }

    .down a:hover{
        cursor: pointer;
        color: white;
    }

    .down a:link,.down a:visited {
        color: white;
    }
</style>
<link rel="stylesheet" href="../../iplme/web/swiper.min.css" />
<script src="../../iplme/web/swiper.min.js"></script>

<script>
    var swiper = new Swiper('.swiper-container', {
        speed: 1000,
        spaceBetween: 0,
        parallax: true,
        slidesPerView: 1,
        loop: true,
        loopFillGroupWithBlank: true,
        autoplay: {
            delay: 10000,
            disableOnInteraction: false
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        }
    });
</script>
