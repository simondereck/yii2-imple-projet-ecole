<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 08/03/2020
 * Time: 00:39
 */
use yii\helpers\Html;
use budyaga\cropper\Widget;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\widgets\ArrayDatas;
use yii\redactor\widgets\Redactor;

$this->title = "创建教授";
?>

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>

    <div class="float-right">
        <?php $form = ActiveForm::begin(['id' => 'form-professeurCreate']); ?>
        <?= $form->field($model,'path')->widget(Widget::className(), [
            'uploadUrl' => Url::toRoute('/article/uploadPhoto'),
            'width'=>280,
            'height'=>280,
            'cropAreaWidth'=>280,
            'cropAreaHeight'=>280
        ]) ?>
        <?= $form->field($model,'name')->textInput() ?>
        <?= $form->field($model,'description')->widget(Redactor::className(),[
            'clientOptions'=>[
                'lang' => 'zh_cn',
            ]
        ])->label(false) ?>
        <?= $form->field($model,'status')->dropDownList(
            ArrayDatas::getProfesseurStatus()
        ) ?>
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
