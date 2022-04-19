<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 06/03/2020
 * Time: 01:02
 */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use budyaga\cropper\Widget;
$this->title = "更新广告";

?>

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>

    <div class="float-right">
        <?php $form = ActiveForm::begin(['id' => 'form-updateSwiper']); ?>
        <?= $form->field($model,'path')->widget(Widget::className(), [
            'uploadUrl' => Url::toRoute('/swiper/uploadPhoto'),
            'width'=>1024,
            'height'=>512,
            'cropAreaWidth'=>512,
            'cropAreaHeight'=>256
        ]) ?>

        <div class="form-group">
            <?= Html::button('上一步', ['class' => 'btn btn-warning','id'=>'back', 'name' => 'create-button']) ?>

            <?= Html::submitButton('更新', ['class' => 'btn btn-success', 'name' => 'create-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</main>

<script>

    $('#back').on('click',function () {
       history.back(-1);
    });
</script>
