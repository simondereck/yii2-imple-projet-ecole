<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 06/03/2020
 * Time: 12:56
 */
use yii\helpers\Html;
use budyaga\cropper\Widget;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\widgets\ArrayDatas;
use yii\redactor\widgets\Redactor;

$this->title = "创建新闻";
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
            'width'=>280,
            'height'=>140,
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
