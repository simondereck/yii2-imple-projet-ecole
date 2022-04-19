<?php

/* @var $this \yii\web\View */
/* @var $content string */

use admin\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use admin\models\AdminAccessControl;
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
    <?php $this->beginContent('@app/views/layouts/header.php') ?>
    <?php $this->endContent() ?>
    <div class="container">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
<?php $this->beginContent('@app/views/layouts/footer.php'); ?>
<?php $this->endContent(); ?>



<style>


    body{
        font-family: -apple-system,
        system-ui,BlinkMacSystemFont,
        "Segoe UI","Hiragino Sans GB","PingFang SC","Microsoft YaHei","WenQuanYi Micro Hei",sans-serif;
        font-weight:normal;
        background: whitesmoke;

    }


    .navbar-fixed-top li{
        height: 80px;
        line-height: 80px;
        background-color:#122130;
    }

    .navbar-fixed-top li>a{
        height: 50px;
        line-height: 50px;
    }

    .navbar-fixed-top li:hover{
        border-top: 2px solid white;
        border-bottom: 2px solid white;
    }


    .bottom-bar{
        background-color: #122130;
        color: white;
        padding: 10px;

        font-weight: lighter;
    }

    .footer-top{
        display: flex;
        justify-content: space-around;
    }
    .bottom-bar h3,label{
        font-weight: lighter;
    }
    .socail button{
        background-color: transparent;
        border: none;
        font-size: 2.5vw;
    }

    .qr-code{
        display: flex;
        margin-top: 10px;
        justify-content: space-around;
    }

    .qr-code img{
        width: 96px;
        height: 96px;
        background-color: transparent;
        padding: 4px;
    }
    .qr-code-item{
        text-align: center;
    }

    .footer-line{
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .footer-line-center{
        width: 80vw;
        border-top: 1px solid whitesmoke;
        padding: 10px;
    }


    .footer-bottom img{
        width: 450px;
        height: 80px;
        object-fit: contain;
    }

    .footer-line-center{
        display:flex ;
        line-height: 50px;
    }

    .second-nav{
        background-color: #31567C;
        color: whitesmoke;
        font-size: 1.25vw;
    }

    .second-nav-ul{
        margin: 0;
        padding: 10px;
    }

    .second-nav-ul li{
        display: inline;
        list-style: none; /* pour enlever les puces sur IE7 */
        padding: 10px;
    }

    .second-nav-ul li:hover{
        background-color: rgba(0,0,0,0.2);
        color: white;
        cursor:pointer;
    }


    .wrap > .container {
        padding: 80px 0px 0px;
    }

    .wrap{
        padding: 0;
    }

    @media (min-width: 768px) {
        .container{
            width: 100%;
        }
    }

    @media (max-width: 767px) {
        .footer-bottom img{
            width: 70vw;
            height: 50px;
            object-fit: contain;
        }

        .footer-top{
            display: block;
            justify-content: space-around;
        }
        .footer-line-center{
            display: block;
        }

        .footer-date{
            margin-top: 10px;
            text-align: center;
        }
    }
</style>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
