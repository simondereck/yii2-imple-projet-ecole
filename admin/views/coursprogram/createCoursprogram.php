<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 26/11/2019
 * Time: 15:38
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\widgets\ArrayDatas;
use common\models\Cours;
use yii\helpers\ArrayHelper;

$this->title = "添加年级课程";
$cours = Cours::find()->select('id,name')->all();
foreach ($cours as $key => $record){
    $cours[$key]->name = $record->id ."--".$record->name;
}

?>

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>
    <div class="float-right">
        <?php $form = ActiveForm::begin(['id' => 'form-createCoursprogram']); ?>

        <?= $form->field($model,'session')->dropDownList(
            ArrayDatas::getSession()
        )?>
        <?= $form->field($model,'year')->dropDownList(
            ArrayDatas::getCoursProgramYear()
        )?>
        <?= $form->field($model,'faculty')->dropDownList(
            ArrayDatas::getFaculty()
        )?>
        <?= $form->field($model,'ness')->checkboxList(
                ArrayHelper::map($cours,'id','name')
        )?>
        <?= $form->field($model,'opt')->checkboxList(
            ArrayHelper::map($cours,'id','name')
        )?>

        <div class="form-group">
            <?= Html::submitButton('创建', ['class' => 'btn btn-success', 'name' => 'create-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</main>
