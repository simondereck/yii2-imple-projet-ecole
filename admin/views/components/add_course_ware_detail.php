<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 28/01/2020
 * Time: 15:05
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "上传课件";
?>
<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>
    <div class="float-right">
        <?php $form = ActiveForm::begin(["options" => ["enctype" => "multipart/form-data"]]); ?>
        <?= $form->field($model,'wid')->textInput(['readonly' => true]) ?>
        <?= $form->field($model,'name')->textInput() ?>
        <?= $form->field($model,'data_url')->fileInput() ?>
        <div class="form-group">
            <?= Html::button('上一步', ['class' => 'btn btn-warning back', 'name' => 'create-button']) ?>
            <?= Html::submitButton('创建', ['class' => 'btn btn-success', 'name' => 'create-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</main>
<script>
    $(".back").on('click',function () {
        window.history.go(-1);
    });
</script>

<style>
    main{
        padding: 2vw;
    }
    .float-right{
        overflow: scroll;
    }

</style>
