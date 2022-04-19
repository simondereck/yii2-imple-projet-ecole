<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 24/11/2019
 * Time: 15:18
 */

?>

<div class="campus">
    <div class="top-bar-img">
        <div class="swiper-container">
            <div class="swiper-wrapper">

                <div class="swiper-slide" data-src="../../images/iplme/campus-6.png">
                    <div class="swiper-pic" >
                        <img src="../../images/iplme/campus-6.png" />
                    </div>
                </div>

                <div class="swiper-slide" data-src="../../images/iplme/campus-7.png">
                    <div class="swiper-pic" >
                        <img src="../../images/iplme/campus-7.png" />
                    </div>
                </div>
                <div class="swiper-slide" data-src="../../images/iplme/campus-2.png">
                    <div class="swiper-pic" >
                        <img src="../../images/iplme/campus-2.png" />
                    </div>
                </div>
                <div class="swiper-slide" data-src="../../images/iplme/campus-3.png">
                    <div class="swiper-pic" >
                        <img src="../../images/iplme/campus-3.png" />
                    </div>
                </div>
                <div class="swiper-slide" data-src="../../images/iplme/campus-4.png">
                    <div class="swiper-pic" >
                        <img src="../../images/iplme/campus-4.png" />
                    </div>
                </div>
                <div class="swiper-slide" data-src="../../images/iplme/campus-5.png">
                    <div class="swiper-pic" >
                        <img src="../../images/iplme/campus-5.png" />
                    </div>
                </div>
                <div class="swiper-slide" data-src="../../images/iplme/campus-1.png">
                    <div class="swiper-pic" >
                        <img src="../../images/iplme/campus-1.png" />
                    </div>
                </div>

            </div>
            <div class="swiper-pagination swiper-pagination-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
            <div class="swiper-button-next swiper-button-white"></div>
        </div>
    </div>
    <div class="campus-items">
        <div class="campus-item">
            <div class="campus-item-info">
                <div class="cell">
                    <h4>Convention</h4>
                    <p>Le campus principal est situé dans le 15ème arrondissement de Paris, à proximité de la rue commerçante animée, rue de convention. Près de la belle rive gauche de la Seine, voici le centre de Paris, où se rassemblent les lettrés, et l'intersection des bâtiments historiques français et des quartiers commerçants modernes.</p>
                    <dl class="inline">
                        <dt>Adresse：</dt>
                        <dd>118 -120 Rue de l'Abbé Groult 75015 Paris</dd>
                    </dl>
                    <dl class="inline">
                        <dt>Tél(FLE) :</dt>
                        <dd>+33 (0)1 45 30 02 29</dd>
                    </dl>
                    <dl class="inline">
                        <dt>Tel (Spécialité) :</dt>
                        <dd>+33 (0)9 82 38 90 78</dd>
                    </dl>
                    <dl class="inline">
                        <dt>Métro：</dt>
                        <dd>Convention, Line 12</dd>
                        <dt>Bus :</dt>
                        <dd> 39, 62, 80, 88, 89</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body{
        background-color: whitesmoke;
    }

    .campus{
        width: 60vw;
        background: white;
        margin: 20px auto 20px;
    }

    .campus-item{
        display: flex;
    }



    .campus-item-info{
        font-size: 1vw;
        padding: 1vw;
    }

    h4{
        font-size: 1.5vw;
        font-weight: bold;
    }

    .swiper-container {
        width: 100%;
        height: 100%;
        background: #000;
    }


    @media screen and (min-width:600px ){
        .swiper-slide {
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            font-size: 18px;
            color:#fff;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
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
            /*margin-bottom: 20px;*/
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
            /*margin-bottom: 10px;*/
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
