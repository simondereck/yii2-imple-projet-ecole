<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 12/12/2019
 * Time: 16:27
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\widgets\ArrayDatas;
$this->title = "更新请求";
?>

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>
    <div class="float-right">
        <?php $form = ActiveForm::begin(['id' => 'form-updateDemander']); ?>
        <?= $form->field($model,'id')->textInput(['disabled'=>'disabled']);?>
        <?= $form->field($model,'gender')->dropDownList(
                ArrayDatas::getGender()
        );?>
        <?= $form->field($model, 'name')->textInput(['autofocus' => true]); ?>

        <?= $form->field($model, 'firstname')->textInput(); ?>
        <?= $form->field($model, 'birthday')->input('date'); ?>
        <?= $form->field($model, 'payer')->textInput(); ?>
        <?= $form->field($model, 'sociale')->textInput(); ?>
        <?= $form->field($model, 'profession')->dropDownList(
            ArrayDatas::getProfession()
        ); ?>
        <?= $form->field($model, 'rue')->textInput(); ?>
        <?= $form->field($model, 'code')->textInput(); ?>
        <?= $form->field($model, 'city')->textInput(); ?>
        <?= $form->field($model, 'telephone')->textInput(); ?>
        <?= $form->field($model, 'email')->textInput(); ?>
        <?= $form->field($model, 'session')->dropDownList(
            ArrayDatas::getSession()
        ); ?>
        <?= $form->field($model, 'year')->dropDownList(
            ArrayDatas::getCoursProgramYear()
        ); ?>

        <?= $form->field($model, 'faculty')->dropDownList(
                ArrayDatas::getFaculty()
        ); ?>
        <?= $form->field($model, 'status')->dropDownList(
            ArrayDatas::getInscriptionStatus()
        ); ?>
        <?= $form->field($model,'ctime')->textInput(['disabled'=>'disabled']); ?>
        <div class="form-group">
            <?= Html::submitButton('更新', ['class' => 'btn btn-success', 'name' => 'update-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

</main>

<style>
    main{
        padding: 2vw;
    }
</style>
