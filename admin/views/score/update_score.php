<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 27/03/2020
 * Time: 13:11
 */
use yii\helpers\Html;
use common\widgets\ArrayDatas;
use yii\widgets\ActiveForm;
$this->title = "更新学生成绩";

?>

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>
    <div class="float-right">
        <div class="base-info">
            <div><?= Html::label($document->name) ?></div>
            <div><?= Html::label($document->firstname) ?></div>
            <div><?= Html::label(ArrayDatas::getGender()[$document->gender]) ?></div>
            <div><?= Html::label(ArrayDatas::getCoursProgramYear()[$document->year]) ?></div>
            <div><?= Html::label(ArrayDatas::getSession()[$document->session]) ?></div>
            <div><?= Html::label(ArrayDatas::getFaculty()[$document->faculty]) ?></div>
        </div>
        <div class="score-info">
            <?php $form = ActiveForm::begin(['id' => 'form-scores']); ?>
            <div>
                <?= Html::beginTag('div',['class'=>'score-info-item-label'])?>
                <?php
                $tmp = new \common\models\ScoreModel();
                foreach ($tmp as $tmpKey => $tmpVa ){ ?>
                    <?= Html::label($tmpKey)?>
            <?php }?>
                <?= Html::endTag("div")?>

                <?php foreach ($scores->options["items"] as $item){ ?>
                <?= Html::beginTag('div',['class'=>'score-info-item'])?>

                <?php foreach ($item as $key => $value){ ?>
                    <?php

                    ?>
                    <?= Html::input('text',$item->matiere."[".$key."]",$value) ?>

                <?php  }?>
                <?= Html::endTag("div")?>

            <?php  }?>
            </div>

            <div class="neguela-button-group">
            <?= Html::submitButton('更新',['class'=>'btn btn-success'])?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>


</main>

<style>
    .base-info{
        padding: 10px;
        background-color: whitesmoke;
        display: table-cell;
    }
    .score-info{
        margin-top: 10px;
    }

    .score-info-item,.score-info-item-label{
        overflow-x: scroll;
        margin-bottom: 10px;
    }

    .score-info-item-label label{
        display: table-cell;
        width: 100px;
        background-color: whitesmoke;
        border-right:1px white solid;
    }
    .score-info-item input{
        display: table-row;
        width: 96px;
        /*border: 1px whitesmoke solid;*/
        margin: 0;
    }



</style>
