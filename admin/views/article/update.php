<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 06/03/2020
 * Time: 17:18
 */
use yii\helpers\Html;
use yii\helpers\Url;
use budyaga\cropper\Widget;
use yii\redactor\widgets\Redactor;
use yii\widgets\ActiveForm;
use common\widgets\ArrayDatas;
$this->title = "更新新闻";
?>
<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
<hr>
</div>

<div class="float-right">
    <?php $form = ActiveForm::begin(['id' => 'form-createArticle']); ?>
    <?= $form->field($model,'cover')->widget(Widget::className(), [
        'uploadUrl' => Url::toRoute('/article/uploadPhoto'),
        'width'=>560,
        'height'=>280,
        'cropAreaWidth'=>280,
        'cropAreaHeight'=>140
    ]) ?>
    <?= $form->field($model,'title')->textInput() ?>
    <?= $form->field($model,'text')->widget(Redactor::className(),[
        'clientOptions'=>[
            'lang' => 'zh_cn',
        ]
    ])->label(false) ?>
    <?= $form->field($model,'status')->dropDownList(
        ArrayDatas::getArticleStatus()
    ) ?>
    <div class="form-group">
        <?= Html::button('上一步', ['class' => 'btn btn-warning','id'=>'back', 'name' => 'create-button']) ?>

        <?= Html::submitButton('更新', ['class' => 'btn btn-success', 'name' => 'create-button']) ?>
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
