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
        <div>BAC+1-3</div>
    </div>
    <div class="bba-description">
        <h4>BBA （Bachelor of Business Administration）工商管理学学士</h4>
        <p>
            亿搏高等商学院长年以秉承“理论知识与实践相结合”的教学宗旨，为工商业各界输送精英人才。学院主要设有：奢侈品管理专业、
            旅游与酒店管理专业、物流运输专业、市场营销专业、国际商务与贸易专业、企业管理专业、金融专业等。
        </p>
    </div>
    <div class="bba-item">
        <div class="bba-item-info">
            <p>
                本科阶段的教学重点是帮助学生充分认识商科，掌握商科的基础知识。学生不仅需要由浅入深地学习其所选专业领域的知识，
                还需要对商科的其他领域有一个基本的了解。学习的同时学生还需要在实践中运用所习得的理论知识，
                如“真实案例模拟”等模拟实际操作训练，这将帮助学生了解公司运作和项目流程，学生在练习中还将不断探索并修正其职业规划。
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

