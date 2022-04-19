<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 03/12/2019
 * Time: 20:23
 */
?>

<div>
    <div class="nav-bba">
        <span data-url="index.php?r=programe/commerce">
            国际贸易
        </span>
        <span data-url="index.php?r=programe/marketing">
            市场营销
        </span>
        <span data-url="index.php?r=programe/logistique">
            国际物流
        </span>
        <span data-url="index.php?r=programe/management">
            奢侈品管理
        </span>
        <span data-url="index.php?r=programe/tourisme">
            酒店与旅游管理
        </span>
        <span data-url="index.php?r=programe/art">
            文化管理
        </span>
        <span data-url="http://www.isiac.fr/">
            电影专业
        </span>
    </div>
</div>
<div class="bba">
    <div class="top-bar-img">
        <img src="../../images/programe/header_page.jpg"/>
        <div>BAC+4-5</div>
    </div>
    <div class="bba-description">
        <h4>MBA（Master of Business Administration）工商管理学硕士</h4>
    </div>
    <div class="bba-item">
        <div class="bba-item-info">
            <p>
                硕士阶段的教学重点是帮助已经熟练掌握商科基础知识的学生对某一专门领域进行深入钻研。除此之外，
                由于硕士阶段的学生即将面临就业，为了使学生可以更好的从学习生涯过渡到职业生涯，我们还特别为学生设置了职业规划、
                商务法语、文化礼仪、第三外语、红酒鉴赏等课程。在第二和第四学期期末，每一个学生还可以完成一个3-6个月的实习。
            </p>

            <h4>热门专业：</h4>
            <ul>
                <li>国际物流</li>
                <li>市场营销</li>
                <li>奢侈品管理</li>
                <li>国际商务与贸易</li>
                <li>旅游与酒店管理</li>
            </ul>
        </div>
        <div class="bba-item-img">
            <img src="../../images/programe/bda1.jpg" />
        </div>
    </div>
</div>
<script>
    $('.nav-bba').on('click','span',function () {
       let url = $(this).attr('data-url');
       window.location = url;
    });
</script>
<style>
    body{
        background-color: whitesmoke;
    }

    .nav-bba{
        background-color: #31567C;
        color: white;
        overflow: scroll;
        display: flex;
        -ms-overflow-style: none;
    }

    .nav-bba span {
        display: inline-block;
        padding: 1vw;
        font-size: 1.25vw;
        list-style: none;
        position: relative;
        text-align: center;
    }

    .nav-bba span:hover{
        background-color: rgba(0,0,0,0.3);
        cursor: pointer;
    }

    .top-bar-img,.top-bar-img img{
        width: 100%;
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
    .bba{
        background-color: white;
        width: 60vw;
        font-size: 1vw;
        margin: 20px auto 20px;
    }

    .bba h4{
        font-size: 1.5vw;
        font-weight: bold;
    }

    .bba-description{
        padding: 2vw;
        background-color: #1b6d85;
        color: white;
    }

    .bba-item{
        display: flex;
    }

    .bba-item-info,.bba-item-img,.bba-item-img img{
        width: 30vw;
    }

    .bba-item-info{
        padding: 2vw;
    }

    .bba-item-img img{
        height: 100%;
    }

    img{
        object-fit: cover;
    }


    ::-webkit-scrollbar {
        display: none;
    }


</style>

