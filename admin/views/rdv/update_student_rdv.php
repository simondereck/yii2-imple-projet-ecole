<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 24/03/2020
 * Time: 01:30
 */
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\IpProfessuer;
use common\widgets\ArrayDatas;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use common\widgets\PublicFunctionUnion;
use yii\helpers\Json;
$this->title = "更新学生rdv";

?>

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>
    <div class="float-right">
        <?php $form = ActiveForm::begin(['id' => 'form-studentRdv']); ?>
        <?php if ($model->steps == 1){ ?>
            <?= $form->field($model,'sid')->textInput([
                'readonly' => true,
            ])->label('学生id') ?>
            <?= $form->field($model,'pid')->dropDownList(
                ArrayHelper::map(IpProfessuer::findAll(["status"=>1]),'id','name')
            )->label('选择教授') ?>
        <?php } else if ($model->steps==2){
            $dateWeekVaild = Json::decode($professeur->sdate);
            $dateWeekDisable = ArrayDatas::getDisableDate($dateWeekVaild);
            $dateVaildGroup = [];

            if (count($temple)>0){
                foreach ($temple as $item){
                    array_push($dateVaildGroup,$item['rdate']);
                }
            }

            $countDateGroup = count($dateVaildGroup) - 1;

            $datesDisable = PublicFunctionUnion::getDatesBetweenTwoDays($dateVaildGroup[0],$dateVaildGroup[$countDateGroup]);
            $datesDisable = array_values(array_diff($dateVaildGroup,$datesDisable));
        ?>
            <?= $form->field($model,'pid')->hiddenInput()->label(false) ?>

            <?= $form->field($model,'pid')->dropDownList(
            ArrayHelper::map(IpProfessuer::findAll(["status"=>1]),'id','name'),[
                'disabled'=> true
            ]
        )->label('Choisissez Professeur') ?>
        <?= $form->field($model,'selectDate')->widget(DatePicker::className(),[
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true,
                'startDate'=>$dateVaildGroup[0],
                'endDate'=>$dateVaildGroup[$countDateGroup],
                'daysOfWeekDisabled'=>$dateWeekDisable,
                'daysOfWeekHighlighted'=>$dateWeekVaild,
                'datesDisabled'=>$datesDisable
            ]
        ])->label('la date') ?>
        <?php }else if ($model->steps==3){ ?>
            <?= $form->field($model,'pid')->dropDownList(
                ArrayHelper::map(IpProfessuer::findAll(["status"=>1]),'id','name'),[
                    'disabled'=> true
                ]
            )->label('Choisissez Professeur') ?>
            <?= $form->field($model,'pid')->hiddenInput()->label(false) ?>
            <?= $form->field($model,'selectDate')->widget(DatePicker::className(),[
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                ],
                'options'=>[
                    'disabled'=> true
                ]
            ])->label('la date') ?>
            <?= $form->field($model,'selectDate')->hiddenInput()->label(false) ?>

            <?= $form->field($model,'selectTime')->dropDownList(
                ArrayHelper::map($rdvTimes,'id','rtime')
            )->label("l'heure") ?>
            <?= $form->field($model,'description')->textarea()->label("La description") ?>

        <?php }?>

        <?= $form->field($model,'steps')->hiddenInput()->label(false)?>


        <div class="form-group">

            <?= Html::submitButton('下一步', ['class' => 'btn btn-success', 'name' => 'create-button']) ?>
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
