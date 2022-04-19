<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 23/05/2019
 * Time: 19:24
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "添加账户";


?>

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>
    <div class="float-right">
        <?php $form = ActiveForm::begin(['id' => 'form-createAdmin']); ?>
        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model,'display_name')->textInput() ?>
        <?= $form->field($model,'email')->textInput() ?>
        <?= $form->field($model,'password')->textInput() ?>
        <?= $form->field($model,'types')->dropDownList([
                0=>'管理员',
                1=>'教授',
                2=>'学生'
        ]) ?>
        <?= $form->field($model,'permission')->dropDownList([
                0=>'超级管理员',
                1=>'普通管理员'
        ])?>

        <?= $form->field($model,'block')->dropDownList([
            0=>'赋权',
            1=>'保存'
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton('创建', ['class' => 'btn btn-success', 'name' => 'create-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</main>
<script>
    $('main').on('change',"#admin-types",function () {
       let val = $(this).val();
        if (val!="0"){
            $('.field-admin-permission').hide('slow');
        }else if (val=="0") {
            $('.field-admin-permission').show('slow');
        }
    });
</script>

