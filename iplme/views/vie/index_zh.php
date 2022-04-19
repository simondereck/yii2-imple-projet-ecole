<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 25/11/2019
 * Time: 14:35
 */
?>

<div class="actualites">
    <div class="top-bar-img">
        <img src="../../images/iplme/actualites.jpg"/>
        <div>最新通知</div>
    </div>
    <div class="actualites-info">
        <p>
            同学们！ 即日起，已可以查询期末考试成绩。正式的成绩单将于六月底开始发放。
        </p>
        <p>
            如需查询期末考试成绩，请发送姓名、专业和年级至电子邮箱：iplmeparis@gmail.com。
        </p>
        <p>
            关于补考时间等信息还请留意邮箱及IPLME官方公众号：iplme0145300229。
        </p>
        <p>
            如有更多疑问，欢迎直接回复邮件或通过微信客服：iplme_paris或电话：01 45 30 02 29 咨询。
        </p>
    </div>
    <div class="actualites-list">
        <div class="actualites-list-info">
            <h4>补考通知</h4>

            <p>2017-2018学年第一次补考具体安排如下， 请各位同学认真复习并准时参加第一次补考。</p>

            <p>10 rue Louis Vicat, 75015 Paris</p>

            <h4>考试地点</h4>

            <p>
                烦请各位同学互相转告，
                并预祝大家取得好成绩！
            </p>
        </div>
        <div><img src="../../images/iplme/actualites_1.jpg"></div>
    </div>
</div>

<style>
    body{
        background: whitesmoke;
    }

    .actualites{
        width: 60vw;
        margin: 20px auto 20px;
        background-color: white;
        font-size: 1vw;
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

    .actualites-info{
        background-color: #1b6d85;
        color: white;
        padding: 2vw;
    }
    .actualites-list{
        display: flex;
    }
    .actualites-list img,.actualites-list-info{
        width: 30vw;
        height: 20vw;
    }

    .actualites-list-info{
        padding: 2vw;
    }

    h4{
        font-size: 1.5vw;
        font-weight: bold;
    }

</style>
