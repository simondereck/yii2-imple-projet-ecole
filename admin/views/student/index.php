<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 12/12/2019
 * Time: 23:08
 */
use yii\helpers\Html;
$this->title = "Ne pas pouvoir choisir vos cous pour ce moment";
?>

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-title">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>
    <div class="float-right">
        Vous ne pouvez pas choisir les cours pour ce moment, veuillez nous contacter par courriel
    </div>
</main>

<style>
    main{
        padding: 2vw;
    }

</style>
