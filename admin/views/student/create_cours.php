<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 12/01/2020
 * Time: 15:26
 */
use yii\widgets\ActiveForm;
use common\widgets\ArrayDatas;
use yii\helpers\Html;
$this->title = "Inscription pédagogique";
?>

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-title">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>
    <div class="float-right">
        <?php $form = ActiveForm::begin(['id' => 'create_form']); ?>
        <?= $form->field($program,'year')->dropDownList(
                ArrayDatas::getCoursProgramYear(),['disabled' => 'disabled']
        ) ?>
        <?= $form->field($program,'session')->dropDownList(
                ArrayDatas::getSession(),['disabled' => 'disabled']
        ) ?>
        <?= $form->field($program,'faculty')->dropDownList(
                ArrayDatas::getFaculty(),['disabled' => 'disabled']
        ) ?>
        <div class="form-group field-coursprogram-ness required has-success">
            <label class="control-label">Require</label>
            <div class="coursprogram-ness">
                <?php
                $nessData = json_decode($program->ness,true);
                if ($nessData){
                    if ($nessData){
                        foreach ($nessData as $key=>$value){
                            echo "<label><input type='checkbox' checked disabled /> ".$value["id"].":".$key." : ".$value["score"]."</label><br>";
                        }
                    }
                }
                ?>
            </div>
        </div>
        <div class="form-group field-coursprogram-opt required has-success">
            <label class="control-label">Options</label>
            <div class="coursprogram-opt">
                <?php
                $optData = json_decode($program->opt,true);
                if ($optData){
                    foreach ($optData as $key=>$value){
                        if (is_array($value)){
                            echo "<label><input type='checkbox' name='CoursProgram[opt][".$key."]' value='".$key."'/> ".$value["id"].":".$key." : ".$value["score"]."</label><br>";
                        }else{
                            echo "<label><input type='checkbox' name='CoursProgram[opt][".$key."]' value='".$key."'/> ".$key." : ".$value."</label><br>";
                        }
                    }
                }
                ?>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton('valider', ['class' => 'btn btn-success', 'name' => 'update-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</main>

<style>
    main{
        padding: 2vw;
    }
</style>
