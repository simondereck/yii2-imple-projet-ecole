<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
Yii::$app->name="My IPLME";

$this->title = 'IPLME';
?>
<div class="site-index">
    <div class="top-bar-img">
        <img src="../../images/admin/welcome.jpg" />
    </div>
    <div class="footer">
        <p>&copy;  <?= date('Y')?>&nbsp;<?= Html::encode(Yii::$app->name) ?> - Tout doit réservé</p>
    </div>
</div>



<style>
    .top-bar-img,.top-bar-img img{
        width: 70vw;
        background-color: white;
        height: 70vh;
    }

    .top-bar-img{
        margin: 20px auto 20px;
    }

    .top-bar-img img{
        object-fit: contain;
    }

    .footer p{
        text-align: center;
    }
</style>
