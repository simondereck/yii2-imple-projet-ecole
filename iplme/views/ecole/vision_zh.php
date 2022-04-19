<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 24/11/2019
 * Time: 15:17
 */
?>

<div class="vision">
    <div class="top-bar-img">
        <img src="../../images/iplme/vision.jpg"/>
        <div>使命愿景</div>
    </div>
    <div class="vision-info">
        <div class="cell" >
            <h4>价值观 </h4>
            <p>IPLME高等商学院秉承三个核心价值观：</p>
            <ul>
                <li>探索</li>
                <li>思考</li>
                <li>成功</li>
            </ul>
            <p>
                IPLME高等商学院通过学校项目与法国内外企业界、学术界的合作，有力的提升了自身的发展与国际拓展。
            </p>
        </div>
        <div class="cell" >
            <h4>愿景 </h4>
            <p>
                IPLME高等商学院有志于在2025年成为法国顶级排名前20的院校之一。我们将继续实施迎合学生需求与期望的教学，
                同时努力解决企业和社会发展中的紧迫问题。
            </p>
        </div>
        <div class="cell">
            <h4>使命 </h4>
            <p>
                我校培养有责任感的创新者。对外合作中我校不断探索并传播新知识，并将其付诸于教学中以启发新的商业实践。
            </p>
        </div>
    </div>
</div>


<style>
    body{
        background-color: whitesmoke;
    }

    .vision{
        width: 60vw;
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

    .vision-info{
        background-color: white;
        padding: 2vw;
        display: flex;
        justify-content: space-around;
    }

    .cell{
        width: 18vw;
    }

    h4{
        font-size: 1.5vw;
        font-weight: bold;
    }
</style>
