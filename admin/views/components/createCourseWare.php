<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 23/01/2020
 * Time: 11:59
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\widgets\ArrayDatas;
use budyaga\cropper\Widget;
use yii\helpers\Url;
use common\models\Cours;
use yii\helpers\ArrayHelper;
$this->title = "添加课件信息";

?>

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>
    <div class="float-right">
        <?php $form = ActiveForm::begin(['id' => 'form-createCourseWare']); ?>
        <?= $form->field($model,'cours')->dropDownList(
                ArrayHelper::map(Cours::find()->all(),'id','name')
        )?>
        <?= $form->field($model,'year')->dropDownList(ArrayDatas::getCoursProgramYear(),[
                'multiple'=>'multiple',
        ]) ?>
        <?= $form->field($model,'faculty')->dropDownList(ArrayDatas::getFaculty(),[
            'multiple'=>'multiple',
        ]) ?>
        <?= $form->field($model,'session')->dropDownList(ArrayDatas::getSession(),[
            'multiple'=>'multiple',
        ]) ?>
        <?= $form->field($model,'image')->widget(Widget::className(), [
            'uploadUrl' => Url::toRoute('/components/uploadPhoto'),
        ]) ?>
        <?= $form->field($model,'description')->textarea() ?>

        <div class="form-group">
            <?= Html::button('上一步', ['class' => 'btn btn-warning','id'=>'back', 'name' => 'create-button']) ?>

            <?= Html::submitButton('创建', ['class' => 'btn btn-success', 'name' => 'create-button']) ?>
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
    $('#back').on('click',function () {
        history.back(-1);
    });
</script>
