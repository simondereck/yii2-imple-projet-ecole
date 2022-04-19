<?php

/* @var $this \yii\web\View */
/* @var $content string */

use admin\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
Yii::$app->name="myIPLME";
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <nav class="admin-nav">
        <div class="admin-nav-title">IPLME</div>
        <div class="admin-nav-content">
            <ul data-href="index.php?r=site/index">
                <h5>系统首页</h5>
            </ul>
            <ul href="index.php?r=admin/index">
                <h5>账号管理</h5>
                <ul>
                    <li href="index.php?r=admin/update">密码修改</li>
                </ul>
            </ul>
            <ul>
                <h5>预约管理</h5>
                <ul>
                    <li href="index.php?r=rdv/index">预约管理</li>
                </ul>
            </ul>
            <ul>
                <h5>Components</h5>
                <ul>
                    <li href="index.php?r=components/inscription">我的注册</li>
                    <li href="index.php?r=student/mon_cours">选课</li>
                    <li>成绩单</li>
                    <li href="index.php?r=components/telecharger">下载课件</li>
                </ul>
            </ul>
            <ul>
                <h5>Extra</h5>
                <ul>
                    <li href="index.php?r=site/contact">联系我们</li>
                    <li href="index.php?r=site/logout">退出登录</li>
                </ul>
            </ul>
        </div>
        <div class="hidden-button"></div>
    </nav>
    <div class="show-button"></div>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
    <div class="langue">
        <form id="langue-form" action="index.php?r=site/langue" method="post">
            <img src="../../images/iplme/fr.jpg"/>
        </form>
    </div>

</div>
<div class="loading">
    <div class="lds-ripple"><div></div><div></div></div>
</div>

<script>
    $loading = $(".loading");
    $('.admin-nav-content').on('click','li',function () {
        let href = $(this).attr('href');
        if (href){
            $loading.show();
            window.location = href;
        }
    });
    $('.admin-nav-content').on('click','ul',function () {
        let url = $(this).attr('data-href');
        if(url){
            $loading.show();
            window.location = url;
        }
    });


    $('.hidden-button').on('click',function () {
        $(".container").animate({width: '90%'},'slow');
        $('.show-button').show();
        $(".admin-nav").animate({width: 'toggle'});
        $(this).hide();
    });

    $('.show-button').on('click',function () {
        $('.admin-nav').animate({width: 'show'});
        $(this).hide();
        $('.container').animate({width: '75vw'});
        $('.hidden-button').show();
    });
    $(".langue").on('click',function () {
        $('#langue-form').submit();
    });
</script>

<style>
    body{
        background-color: whitesmoke;
    }

    .wrap{
        display: flex;
        height: 100%;
        padding: 0;
        margin: 0;
    }
    .wrap > .container{
        padding: 0;
    }

    .admin-nav{
        width: 20%;
        height: 100%;
        background-color: white;
        box-shadow: 0px 0px 5px 2px rgba(0,0,0,0.2);
    }

    .admin-nav-content{
        overflow: scroll;
        height: calc(100% - 8vw);

    }

    .container{
        width: 75vw;
        max-height: 100vw;
        overflow: scroll;
        background-color: white;
    }

    ::-webkit-scrollbar {
        display: none;
    }

    .admin-nav-title{
        font-size: 2vw;
        font-weight: bold;
        padding: 2vw;
        text-align: center;
    }

    .admin-nav ul,li{
        padding: 0;
        margin: 0;
        font-size: 1vw;
        list-style: none;
        background-position: center;
        transition: background 0.8s;
    }


    .admin-nav li{
        padding: 1.5vw;
        padding-left: 3vw;
    }

    .admin-nav h5 {
        font-size: 1.25vw;
        font-weight: bold;
        padding: 1vw;
        margin: 0;
        color: gray;
    }

    .admin-nav h5:hover,li:hover{
        color: white;
        cursor: pointer;
        background: #122b40 radial-gradient(circle, transparent 1%, #1b6d85 1%) center/15000%;
    }

    .admin-nav h5:active, li:active{
        background-color: rgba(255,255,255,0.4);
        background-size: 100%;
        transition: background 0s;
    }

    .hidden-button{
        background-color: black;
        position: absolute;
        left: 20vw;
        top: 0vw;
    }
    .hidden-button:after{
        content: '<<';
        color: white;
        font-weight: bold;
        text-align: center;
        padding: 10px;
        font-size: 1.25vw;
    }


    .show-button{
        position: absolute;
        background-color: black;
        top: 0vw;
        display: none;
    }

    .show-button:after{
        content: '>>';
        color: white;
        font-weight: bold;
        text-align: center;
        padding: 10px;
        font-size: 1.25vw;
    }

    .hidden-button:hover{
        color: white;
        background-color: #1b6d85;
        box-shadow: 0px 0px 4px 1px rgba(0,0,0,0.5);
        cursor:pointer;
    }


    .show-button:hover{
        color: white;
        background-color: #1b6d85;
        box-shadow: 0px 0px 4px 1px rgba(0,0,0,0.5);
        cursor:pointer;
    }

    .loading{
        position: absolute;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255,255,255,0.5);
        display: none;
    }

    .lds-ripple {
        display: inline-block;
        position: absolute;
        top: 20vw;
        right:calc(50vw - 40px);
        width: 80px;
        height: 80px;
    }
    .lds-ripple div {
        position: absolute;
        border: 4px solid #1b6d85;
        opacity: 1;
        border-radius: 50%;
        animation: lds-ripple 1.5s cubic-bezier(0, 0.2, 0.8, 1) infinite;
    }
    .lds-ripple div:nth-child(2) {
        animation-delay: -0.5s;
    }
    @keyframes lds-ripple {
        0% {
            top: 36px;
            left: 36px;
            width: 0;
            height: 0;
            opacity: 1;
        }
        100% {
            top: 0px;
            left: 0px;
            width: 72px;
            height: 72px;
            opacity: 0;
        }
    }

    .ripple:active {
        background-color: #6eb9f7;
        background-size: 100%;
        transition: background 0s;
    }


    .langue{
        position: absolute;
        top: 3vh;
        right: 5vw;
        height: 20px;
        width: 30px;
    }
    .langue img{
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .langue img:hover{
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.3);
    }
</style>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
