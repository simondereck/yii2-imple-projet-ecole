<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 12/03/2020
 * Time: 16:29
 */
use yii\helpers\Html;
use common\models\IpProfessuer;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\widgets\ArrayDatas;
use kartik\date\DatePicker;
use common\widgets\PublicFunctionUnion;
$this->title = "创建教授日程";
?>

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>

    <div class="float-right">
        <?php $form = ActiveForm::begin(['id' => 'form-professeurRdv']); ?>

        <?= $form->field($model,'pid')->dropDownList(
                ArrayHelper::map(IpProfessuer::findAll(["status"=>1]),'id','name')
        )->label('选择教授') ?>
        <?= $form->field($model,'sdate')->dropDownList(
                ArrayDatas::getRdvDate(),
                [
                  'multiple'=>'multiple',
                ]
        )->label("选择时间")?>
        <?= $form->field($model,'dateArea[0]')->widget(DatePicker::className(),[
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true,
                'startDate'=>PublicFunctionUnion::getDateString(),
                'daysOfWeekDisabled'=>[0,6],
            ]
        ])->label("开始日期")?>
        <?= $form->field($model,'dateArea[1]')->widget(DatePicker::className(),[
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true,
                'startDate'=>PublicFunctionUnion::getDateString(),
                'daysOfWeekDisabled'=>[0,6],
            ]
        ])->label("结束日期")?>
        <?= $form->field($model,'stime[0]')->dropDownList(ArrayDatas::getRdvTime())->label("开始时间")?>
        <?= $form->field($model,'stime[1]')->dropDownList(ArrayDatas::getRdvTime())->label("结束时间")?>
        <?= $form->field($model,'interval')->dropDownList(ArrayDatas::getRdvPeriod())->label('每') ?>
        <div class="form-group">
            <?= Html::button('上一步', ['class' => 'btn btn-warning','id'=>'back', 'name' => 'create-button']) ?>

            <?= Html::submitButton('创建', ['class' => 'btn btn-success', 'name' => 'create-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</main>

<style>
    .float-right{
        overflow: scroll;
    }

    .redactor-editor{
        min-height: 500px;
    }
</style>

<script>
    $('#back').on('click',function () {
        history.back(-1);
    });
</script>
