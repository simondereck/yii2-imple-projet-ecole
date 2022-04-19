<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 26/11/2019
 * Time: 15:38
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\widgets\ArrayDatas;
?>


<div class="demander">
    <h3>申请DBA</h3>
    <div class="submit-form-content">
        <?php $form = ActiveForm::begin(['id'=>'create-dba-form','options' => ['enctype' => 'multipart/form-data']]); ?>
        <?= $form->field($model,'gender')->dropDownList(
            ArrayDatas::getGender()
        )?>
        <?= $form->field($model,'name')->textInput()?>
        <?= $form->field($model,'firstname')->textInput()?>
        <?= $form->field($model,'birthday')->input('date')?>
        <?= $form->field($model,'payer')->textInput()?>
        <?= $form->field($model,'sociale')->textInput()?>

        <?= $form->field($model,'profession')->dropDownList(
                ArrayDatas::getProfession()
        )?>
        <?= $form->field($model,'rue')->textInput()?>
        <?= $form->field($model,'code')->textInput()?>
        <?= $form->field($model,'city')->textInput()?>
        <?= $form->field($model,'telephone')->textInput()?>

        <?= $form->field($model,'email')->textInput()?>
        <?= $form->field($model,'session')->dropDownList(
                ArrayDatas::getSession()
        )?>
        <?= $form->field($model,'year')->dropDownList(
                ArrayDatas::getProgramYear(3)
        )?>
        <?= $form->field($model,'faculty')->dropDownList(
            ArrayDatas::getFaculty()
        )?>
        <div class="button-groups" >
            <?= Html::submitButton('发送' , ['class' =>  'btn btn-warning','name'=>'create']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

<style>
    body{
        background-color: whitesmoke;
    }

    h3{
        text-align: center;
        font-size: 2vw;
        font-weight: bold;
    }

    h4{
        font-size: 1vw;
        color: darkred;
    }

    .demander{
        padding: 2vw;
        width: 70vw;
        background-color: white;
        margin: 20px auto 20px;
    }
    .button-groups{
        text-align: center;
    }


</style>

