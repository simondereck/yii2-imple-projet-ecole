<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 20/03/2020
 * Time: 23:58
 */
use yii\helpers\Html;
?>


<div class="message">
    <div>Votre message est bien envoyé et nous le traiterons le plus vite possible.</div>
    <div style="text-align: right;">
        <?= Html::button('Ok',['class'=>'btn btn-warning ok']) ?>
    </div>
</div>


<script>
    $('.ok').on('click',function () {
       window.location.href = "index.php?r=site/index";
    });
</script>

<style>
    .message{
        width: 75vw;
        margin: 50px auto 50px;
        font-size: 2vw;
        background-color: whitesmoke;
        padding: 2vw;
        box-shadow: 3px 0 5px rgba(0,0,0,0.3);
    }
</style>
