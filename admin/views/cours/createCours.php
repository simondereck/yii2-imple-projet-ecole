<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 23/05/2019
 * Time: 19:24
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "添加课程";


?>

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>
    <div class="float-right">
        <?php $form = ActiveForm::begin(['id' => 'form-createCours']); ?>
        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model,'descript')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('创建', ['class' => 'btn btn-success', 'name' => 'create-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</main>
