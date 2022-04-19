<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 27/01/2020
 * Time: 19:04
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\widgets\ArrayDatas;
use budyaga\cropper\Widget;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use common\models\Cours;
$this->title = "更新课件信息";

?>
<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>
    <div class="float-right">
        <?php $form = ActiveForm::begin(['id' => 'form-update-course-ware']); ?>
        <?= $form->field($model, 'cours')->dropDownList(
            ArrayHelper::map(Cours::find()->all(),'id','name')
        ) ?>
        <?= $form->field($model,'image')->widget(Widget::className(), [
            'uploadUrl' => Url::toRoute('/components/uploadPhoto'),
        ]) ?>
        <?php $form->field($model,'cours')->dropDownList(
                ArrayHelper::map(Cours::find()->all(),'id','name')
        )?>
        <?= $form->field($model,'year')->dropDownList(
            ArrayDatas::getCoursProgramYear(),[
                'multiple'=>'multiple',
            ]
        ) ?>
        <?= $form->field($model,'faculty')->dropDownList(
            ArrayDatas::getFaculty(),[
                'multiple'=>'multiple',
            ]
        ) ?>
        <?= $form->field($model,'session')->dropDownList(
            ArrayDatas::getSession(),
                [
                    'multiple'=>'multiple',
                ]
        ) ?>
        <?= $form->field($model,'description')->textarea()?>


        <div class="form-group">
            <?= Html::button('上一步', ['class' => 'btn btn-warning back', 'name' => 'create-button']) ?>

            <?= Html::submitButton('更新', ['class' => 'btn btn-success', 'name' => 'update-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

</main>


<style>
    main{
        padding: 2vw;
    }
    .float-right{
        overflow: scroll;
    }


</style>

<script>
    $(".back").on('click',function () {
        window.history.back(-1);
    })
</script>
