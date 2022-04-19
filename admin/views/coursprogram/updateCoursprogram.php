<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 24/05/2019
 * Time: 14:42
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\widgets\ArrayDatas;
use yii\helpers\Json;
$this->title = "更新年级课程";

?>

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>
    <div class="float-right">
        <?php $form = ActiveForm::begin(['id' => 'form-updateCoursprogram']); ?>
        <?= $form->field($model,'session')->dropDownList(
                ArrayDatas::getSession()
        )?>
        <?= $form->field($model,'year')->dropDownList(
                ArrayDatas::getCoursProgramYear()
        )?>
        <?= $form->field($model,'faculty')->dropDownList(
                ArrayDatas::getFaculty()
        )?>
        <div class="form-group">
            <label class="control-label">Required</label>
            <div class="CoursProgram-ness">
                <?php
                    $nessData = Json::decode($model->ness);
                    foreach ($nessData as $key => $value) {
                        if (is_array($value)){
                            echo '<label><input type="checkbox" name="CoursProgram[ness][]" value="'.$key.'" checked disabled="true"/> '.$key.'</input></lable>';
                            echo '&nbsp';
                            echo '<input type="number" class="form-control" name="CoursProgram[nessnote][]" value="'.$value['score'].'">';
                        }else{
                            echo '<label><input type="checkbox" name="CoursProgram[ness][]" value="'.$key.'" checked disabled="true"/> '.$key.'</input></lable>';
                            echo '&nbsp';
                            echo '<input type="number" class="form-control" name="CoursProgram[nessnote][]" value="'.$value.'">';
                        }

                    }
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Option</label>
            <div class="CoursProgram-opt">
                <?php
                    $optData = json_decode($model->opt, true);
                    foreach ($optData as $key => $value) {
                        if (is_array($value)){
                            echo '<label><input type="checkbox" name="CoursProgram[opt][]" value="'.$key.'" checked disabled="true"/> '.$key.'</input></lable>';
                            echo '&nbsp';
                            echo '<input type="number" class="form-control" name="CoursProgram[optnote][]" value="'.$value['score'].'">';

                        }else{
                            echo '<label><input type="checkbox" name="CoursProgram[opt][]" value="'.$key.'" checked disabled="true"/> '.$key.'</input></lable>';
                            echo '&nbsp';
                            echo '<input type="number" class="form-control" name="CoursProgram[optnote][]" value="'.$value.'">';

                        }

                    }

                ?>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('更新', ['class' => 'btn btn-success', 'name' => 'update-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

</main>
