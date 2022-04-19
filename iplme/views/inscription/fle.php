<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 26/11/2019
 * Time: 15:38
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\widgets\ArrayDatas;

?>
<div class="demander">
    <h3>Demander FLE</h3>
    <div class="submit-form-content">
        <?php $form = ActiveForm::begin(['id'=>'create-bba-form','options' => ['enctype' => 'multipart/form-data']]); ?>
        <?= $form->field($model,'gender')->dropDownList(
                ArrayDatas::getGender()
        )->label('Civilité')?>

        <?= $form->field($model,'name')->textInput()->label('Prénom')?>
        <?= $form->field($model,'firstname')->textInput()->label('Nom')?>
        <?= $form->field($model,'birthday')->input('date')->label('Date de naissance')?>
        <?= $form->field($model,'payer')->textInput()->label('Pays')?>
        <?= $form->field($model,'sociale')->textInput()->label('Sociale')?>
        <?= $form->field($model,'profession')->dropDownList(
                ArrayDatas::getProfession()
        )->label('Profession')?>
        <?= $form->field($model,'rue')->textInput()->label('Rue')?>
        <?= $form->field($model,'code')->textInput()->label('Code postal')?>
        <?= $form->field($model,'city')->textInput()->label('Ville')?>
        <?= $form->field($model,'telephone')->textInput()->label('Téléphone')?>
        <?= $form->field($model,'email')->textInput()->label('Email')?>
        <?= $form->field($model,'level')->dropDownList(
                ArrayDatas::getLevel()
        )->label('Niveau')?>

        <div class="button-groups">
            <?= Html::submitButton('Envoyer' , ['class' =>  'btn btn-warning','name'=>'create']) ?>
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
