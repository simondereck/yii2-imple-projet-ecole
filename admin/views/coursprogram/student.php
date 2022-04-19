<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 11/12/2019
 * Time: 17:26
 */
//display all demander
use yii\helpers\Html;
use yii\grid\GridView;
use common\widgets\ArrayDatas;
use common\models\Demander;
$this->title = "学生课程列表";
?>

<main role="main">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>

    <div class="float-right">
        <div>
            <?=
            GridView::widget([
//                'filterModel' => $searchModel,
                "dataProvider" => $dataProvider,
                "columns" => [
                    'id',
                    [
                        'attribute'=>'sid',
                        'format'=>'html',
                        'value'=>function($model){
                            $demander = Demander::findOne(["uid"=>$model->sid]);
                            return $demander->name." ".$demander->firstname."<br>".$demander->email
                                ."<br>".$demander->telephone;
                        }
                    ],
                    [
                        'attribute'=>'faculty',
                        'value'=>function($model){
                            return ArrayDatas::getFaculty()[$model->faculty];
                        }
                    ],
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
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template'=>'{view_cours},{delete_cours}',
                        'buttons'=>[
                            'view_cours'=>function($url,$model,$key)
                            {
                                $options=[
                                    'title'=>Yii::t('yii','查看详情'),
                                    'aria-label'=>Yii::t('yii','查看详情'),
                                    'data-pjax'=>'0',
                                ];
                                return Html::a('<span class="glyphicon glyphicon-glass"></span>',$url,$options);
                            },
                            'delete_cours'=>function($url,$model,$key)
                            {
                                $options=[
                                    'title'=>Yii::t('yii','删除'),
                                    'aria-label'=>Yii::t('yii','删除'),
                                    'data-pjax'=>'0',
                                ];
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>',$url,$options);
                            },
                        ]
                    ],
                ]
            ])
            ?>
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

