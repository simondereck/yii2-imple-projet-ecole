<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 18/03/2020
 * Time: 15:59
 */
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\widgets\ArrayDatas;

$this->title = "Mon inscription";

?>

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>

    <div class="float-right">
        <div>
            <?php if (Yii::$app->user->identity["types"]===2){ ?>
                <?=
                DetailView::widget([
                    'model' => $model,
                    "attributes" => [
                        'id',
                        'name',
                        'firstname',
                        [
                            'label'=>'gender',
                            'value'=>function($model){
                                return ArrayDatas::getGender()[$model->gender];
//                                return $model===0?'madame':'mademoiselle';
                            }
                        ],
                        'telephone',

                        'email',
                        'payer',
                        'birthday',
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

                    ]
                ])
                ?>
            <?php }else {?>

                <?=
                DetailView::widget([
                    'model' => $model,
                    "attributes" => [
                        'id',
                        'name',
                        'firstname',
                        [
                            'label'=>'gender',
                            'value'=>function($model){
                                return $model===0?'madame':'mademoiselle';
                            }
                        ],
                        'telephone',

                        'email',
                        'payer',
                        'birthday',
                        'sociale',
                        'rue',
                        'code',
                        'city',
                        [
                            'attribute'=>'level',
                            'value'=>function($model){
                                return ArrayDatas::getLevel()[$model->level];
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

                    ]
                ])
                ?>
            <?php }?>
        </div>
    </div>

</main>



<?php
yii\bootstrap\Modal::begin([
    'headerOptions' => ['id' => 'modalHeader'],
    'id' => 'modal',
    'size' => 'modal-lg',
    //keeps from closing modal with esc key or by clicking out of the modal.
    // user must click cancel or X to close
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);
echo "<div id='modalContent'></div>";
yii\bootstrap\Modal::end();
?>

<style>
    main{
        padding: 2vw;
    }
    .float-right{
        overflow: scroll;
    }

</style>

