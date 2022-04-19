<?php

/* @var $this \yii\web\View */
/* @var $content string */

use iplme\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
Yii::$app->name="IPLME";
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="école supérieure de commerce,business school,école de management,masters,Mastères,MBA,formation continue Nantes,Audencia,Nantes,grande ecole,sai,em lyon,grenoble,国际硕士,法国,商学院,法国高商,大学校,法国硕士,法国留学,法国高等商学院,法国排名前十的高商,FT法国高商排名,供应链与采购管理,食品学与农业企业管理,艺术创新与创业管理,国际管理学硕士,咨询专业,体育管理全法排名第一,艺术管理,大学校管理学硕士,法国国家文凭,法国精英文凭">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!--<div>-->
<!--    <div class="nav-art">-->
<!--        <span data-url="index.php?r=programe/commerce">-->
<!--            Commerce et affaires Internationales-->
<!--        </span>-->
<!--        <span data-url="index.php?r=programe/marketing">-->
<!--            Marketing d’entreprise-->
<!--        </span>-->
<!--        <span data-url="index.php?r=programe/logistique">-->
<!--            Logistique et transports internationaux-->
<!--        </span>-->
<!--        <span data-url="index.php?r=programe/management">-->
<!--            Management du Luxe et Tourisme culture-->
<!--        </span>-->
<!--        <span data-url="index.php?r=programe/tourisme">-->
<!--            Management et Gestion d’Hôtellerie-->
<!--        </span>-->
<!--        <span data-url="index.php?r=programe/art">-->
<!--            Arts et Médias-->
<!--        </span>-->
<!--        <span data-url="http://www.isiac.fr/">-->
<!--            Cinéma et Production Audiovisuelle-->
<!--        </span>-->
<!--    </div>-->
<!--</div>-->
<div class="wrap">
    <?php $this->beginContent('@app/views/layouts/header.php') ?>
    <?php $this->endContent() ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <div class="second-nav-div">
            <nav class="second-nav">
<!--                <ul class="second-nav-ul">-->
                    <li data-href="commerce">Commerce et affaires Internationales</li>
                    <li data-href="marketing">Marketing d’entreprise</li>
                    <li data-href="logistique">Logistique et transports internationaux</li>
                    <li data-href="management">Management du Luxe et Tourisme culture</li>
                    <li data-href="tourisme">Management et Gestion d’Hôtellerie</li>
                    <li data-href="art">Arts et Médias</li>
                    <li data-href="cinema">Cinéma et Production Audiovisuelle</li>
<!--                </ul>-->
            </nav>
        </div>
        <?= $content ?>
    </div>

</div>
<?php $this->beginContent('@app/views/layouts/footer.php'); ?>
<?php $this->endContent(); ?>

<script>
    $('.second-nav').on('click','li',function () {
        let val = $(this).attr('data-href');
        window.location = 'index.php?r=programe/'+val;
    });
    $('.socail').on('click','button',function () {
        let url = $(this).attr('href');
        window.open(url);
    });

</script>

<style>
    body{
        font-family: -apple-system,
        system-ui,BlinkMacSystemFont,
        "Segoe UI","Hiragino Sans GB","PingFang SC","Microsoft YaHei","WenQuanYi Micro Hei",sans-serif;
        font-weight:normal;

    }


    .second-nav-div{
        position: sticky;
        top: 80px;
        z-index: 1000;




    }

    .second-nav{
        /*background-color: #31567C;*/
        color: white;
        overflow: scroll;
        display: flex;
        -ms-overflow-style: none;
    }

    .second-nav li{
        display: inline-flex;
        padding: 1vw;
        font-size: 1.25vw;
        list-style: none;
        position: relative;
        text-align: center;
    }


    .second-nav li:hover{
        background-color: rgba(0,0,0,0.3);
        cursor: pointer;
    }



    .navbar-fixed-top li{
        height: 80px;
        line-height: 80px
        background-color:#122130;

    }

    /*.nav-art span:hover{*/
        /*background-color: rgba(0,0,0,0.3);*/
        /*cursor: pointer;*/
    /*}*/
    /**/
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


    @media (min-width: 768px){

        .container {
            width: 100%;
        }
        .footer-line-center{

        }
        /*.top-bar-img,.top-bar-img img{*/
            /*width: 100%;*/
            /*height: 25vw;*/
        /*}*/

    }

    @media (max-width: 767px) {
        /*.top-bar-img,.top-bar-img img{*/
            /*width: 100%;*/
            /*height: 45vw;*/
        /*}*/
        .second-nav-ul{
            display: inline-block;
        }
        .second-nav-ul li{
            display: inline-flex;
        }

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
