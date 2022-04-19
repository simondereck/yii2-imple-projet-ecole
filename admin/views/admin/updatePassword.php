<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 24/05/2019
 * Time: 14:42
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = "更新账户";

?>

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>
    <div class="float-right">
        <?php $form = ActiveForm::begin(['id' => 'form-updateAdmin']); ?>
        <?= $form->field($model, 'name')->textInput(['disabled' => 'disabled']) ?>
        <?= $form->field($model,'display_name')->textInput(['disabled' => 'disabled']) ?>
        <?= $form->field($model,'email')->textInput(['disabled' => 'disabled']) ?>
        <?= $form->field($model,'password')->textInput() ?>
        <div class="form-group">
            <?= Html::submitButton('更新', ['class' => 'btn btn-success', 'name' => 'update-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

</main>
