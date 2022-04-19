<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 19/01/2020
 * Time: 15:05
 */
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\widgets\ArrayDatas;
use yii\widgets\ActiveForm;
$this->title = "学生选课列表";
?>

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">

    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>
    <div class="float-right">
        <?php
            if ($isCours){
                ?>
                <div class="site-title">
                    <?php
                    if ($cours->status===0){
                        echo "<h3 class='wait'>课程等待确认</h3>";
                    }else if ($cours->status===1){
                        echo "<h3 class='valid'>".$document->name." 的选课 </h3>";
                    }else if ($cours->status===2){
                        echo "<h3 class='invalid'>课程无效，联系学校</h3>";
                    }
                    ?>
                </div>
                <div>
                    <?=
                        DetailView::widget([
                            'model'=>$document,
                            'attributes'=>[
                                'id',
                                'name',
                                'firstname',
                                [
                                    'label'=>'gender',
                                    'value'=>function($model){
                                        return ArrayDatas::getGender()[$model->gender];
                                    }
                                ],
                                'birthday',
                                'payer',
                                'sociale',
                                [
                                    'attribute'=>'profession',
                                    'value'=>function($model){
                                        return ArrayDatas::getProfession()[$model->profession];
                                    }
                                ],
                                'rue',
                                'code',
                                'city',
                                'telephone',
                                [
                                    'attribute'=>'session',
                                    'value'=>function($model){
                                        return ArrayDatas::getSession()[$model->session];
                                    }
                                ],
                                [
                                    'attribute'=>'year',
                                    'value'=>function($model){
                                        return ArrayDatas::getCoursProgramYear()[$model->year];
                                    }
                                ],
                                [
                                    'attribute'=>'faculty',
                                    'value'=>function($model){
                                        return ArrayDatas::getFaculty()[$model->faculty];
                                    }
                                ],
                                [
                                    'attribute'=>'status',
                                    'value'=>function($model){
                                        if ($model->status==0) {
                                            return "waiting process";
                                        }else if ($model->status==1){
                                            return "success";
                                        }else{
                                            return "blocked";
                                        }
                                    }
                                ],
                                'email',
                            ]
                        ])
                    ?>
                </div>
                <div>
                    <?=
                    DetailView::widget([
                        'model' => $cours,
                        'attributes' => [
                            [
                                'attribute'=>'year',
                                'value'=>function($model){
                                    return ArrayDatas::getCoursProgramYear()[$model->year];
                                }
                            ],
                            [
                                'attribute'=>'session',
                                'value'=>function($model){
                                    return ArrayDatas::getSession()[$model->session];
                                }
                            ],
                            [
                                'attribute'=>'faculty',
                                'value'=>function($model){
                                    return ArrayDatas::getFaculty()[$model->faculty];
                                }
                            ],
                            [
                                'attribute'=>'cours',
                                'format'=>'html',
                                'value'=>function($model){
                                    $cours = json_decode($model->cours,true);
                                    $courStr = "必须课:<br>" ;
                                    foreach ($cours["ness"] as $key=>$value){
                                        if (is_array($value)){
                                            $courStr .=  $key." : ".$value["score"]." <br>";
                                        }else{
                                            $courStr .=  $key." : ".$value." <br>";
                                        }
                                    }
                                    $courStr .= "选修课:<br> ";
                                    foreach ($cours["opt"] as $key=>$value){
                                        if (is_array($value)){
                                            $courStr .= $key." : ".$value["score"] ." <br>";
                                        }else{
                                            $courStr .= $key." : ".$value ." <br>";
                                        }
                                    }
                                    return $courStr;
                                }
                            ],

                            'ctime',
                        ],
                    ]);
                    ?>
                    <?php if ($cours->status!=1) {
                        ?>
                        <div>
                            <?php $form = ActiveForm::begin(['id' => 'form-updateCoursprogram']); ?>
                            <?= $form->field($cours,'id')->hiddenInput()->label(false)?>
                            <div class="form-group">
                                <?= Html::submitButton('确认选课', ['class' => 'btn btn-success', 'name' => 'update-button']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    <?php }?>
                </div>
                <?php
            }else{
                ?>
                <div><?php echo $message; ?></div>
                <div class="form-group">
                    <?= Html::button('返回',['class'=>'btn btn-warning back']) ?>
                </div>
                <?php
            }
        ?>
    </div>
</main>


<style>
    main{
        padding: 2vw;
    }
    .float-right{
        overflow: scroll;
    }

    .wait{
        color: #1b6d85;
    }
    .invaild{
        color: darkred;
    }

    .valid{
        color: orangered;
    }
</style>
<script>
    $(".back").on('click',function () {
        window.history.back(-1);
    });
</script>
