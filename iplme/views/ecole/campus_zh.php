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
        <img src="../../images/iplme/campus.jpg" />
        <div>校区</div>
    </div>
    <div class="campus-items">
        <div class="campus-item">
            <div class="campus-item-img"><img src="../../images/iplme/campus_1.jpg" /></div>
            <div class="campus-item-info">
                <div class="cell">
                    <h4>Convention校区</h4>
                    <p>
                        总校区巴黎 15区,临近繁华商业街 rue de convention。
                        紧靠美丽的塞纳河左岸;这里是文人荟萃的巴黎中心,更是法国历史建筑与现代商业街区的交汇处。
                    </p>
                    <p>
                        巴黎校区开设了部分专业硕士项目和管理教育项目。
                    </p>
                    <dl class="inline">
                        <dt>地址：</dt>
                        <dd>7 rue du Commandant Léandri, 75015 Paris</dd>
                    </dl>
                    <dl class="inline">
                        <dt>电话：</dt>
                        <dd>+33 1 45 30 02 29</dd>
                    </dl>
                    <dl class="inline">
                        <dt>地铁站：</dt>
                        <dd>Convention, Line 12 / Boucicaut, line 8</dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="campus-item">
            <div class="campus-item-info">
                <div class="cell">
                    <h4>Porte de Versailles校区</h4>
                    <p>
                        毗邻凡尔赛门展览中心 ,交通便利。周围有大大小小的巴黎城市公园,该街区亦有无数法式咖啡馆、餐厅、甜点店以及超市,
                        极大的方便了您的日常生活。
                    </p>
                    <p>
                        巴黎校区开设了部分专业硕士项目和管理教育项目。
                    </p>
                    <dl class="inline">
                        <dt>地址：</dt>
                        <dd>10 Rue Louis Vicat, 75015 Paris</dd>
                    </dl>
                    <dl class="inline">
                        <dt>电话：</dt>
                        <dd>+33 1 73 72 52 66</dd>
                    </dl>
                    <dl class="inline">
                        <dt>地铁站：</dt>
                        <dd>Porte de Versailles, Line 12 / Malakoff Plateau de Vanves, line 13</dd>
                    </dl>
                </div>
            </div>
            <div class="campus-item-img"><img src="../../images/iplme/campus_2.jpg" /></div>
        </div>
        <div class="campus-item">
            <div class="campus-item-img"><img src="../../images/iplme/campus_3.jpg" /></div>
            <div class="campus-item-info">
                <div class="cell">
                    <h4>Montparnasse校区</h4>
                    <p>
                        在这里学习的同时,您也可以在端一杯意式浓缩咖啡,在和煦的阳光中慢慢品尝,漫步于绿树成荫的巴黎街道,体验见证真正的法国文化和法式生活。
                    </p>
                    <dl class="inline">
                        <dt>地址：</dt>
                        <dd>1 rue l’Arrivée Tour Montparnasse Rive Gauche, 75015 Paris</dd>
                    </dl>
                    <dl class="inline">
                        <dt>电话：</dt>
                        <dd>+33 1 73 72 52 65</dd>
                    </dl>
                    <dl class="inline">
                        <dt>地铁站：</dt>
                        <dd>Montparnasse Bienvenüe, Line 12/ 13/ 6/ 4</dd>
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

    .top-bar-img,.top-bar-img img{
        width: 60vw;
        height: 20vw;
        position: relative;
    }

    .top-bar-img div{
        font-size: 2vw;
        color: white;
        padding: 2vw;
        position: absolute;
        top: 0;
        z-index: 200;
    }

    img{
        object-fit: cover;
    }

    .campus-item{
        display: flex;
    }

    .campus-item-img,.campus-item-img img{
        width: 30vw;
        height: 30vw;
    }

    .campus-item-info{
        width: 30vw;
        font-size: 1vw;
        padding: 1vw;
    }

    h4{
        font-size: 1.5vw;
        font-weight: bold;
    }
</style>
