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
$this->title = "网站注册";
?>




<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>

    <div class="float-right">
        <div>
            <?=
            GridView::widget([
                'filterModel' => $searchModel,
                "dataProvider" => $dataProvider,
                "columns" => [
                    'id',
                    [
                        'attribute'=>'status',
                        'format'=>'html',
                        'value'=>function($model){
                            if ($model->status==0) {
                                return "<div style='color:red;'>waiting process</div>";
                            }else if ($model->status==1){
                                return "<div style='color:green;'>success</div>";
                            }else{
                                return "blocked";
                            }
                        }
                    ],
                    'name',
                    'firstname',
                    [
                            'label'=>'gender',
                            'value'=>function($model){
                                return ArrayDatas::getGender()[$model->gender];
                            }
                    ],
                    'telephone',
                    'ctime',
                    'email',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template'=>'{delete_demander},{update_demander},{create_demander}',
                        'buttons'=>[
                            'delete_demander'=>function($url,$model,$key)
                            {
                                $options=[
                                    'title'=>Yii::t('yii','删除请求'),
                                    'aria-label'=>Yii::t('yii','删除请求'),
                                    'data-pjax'=>'0',
                                ];
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>',$url,$options);
                            },
                            'update_demander'=>function($url,$model,$key)
                            {
                                $options=[
                                    'title'=>Yii::t('yii','更新请求'),
                                    'aria-label'=>Yii::t('yii','更新请求'),
                                    'data-pjax'=>'0',
                                ];
                                return Html::a('<span class="glyphicon glyphicon-edit"></span>',$url,$options);
                            },
                            'create_demander'=>function($url,$model,$key){
                                $options=[
                                    'title'=>Yii::t('yii','创建账户'),
                                    'aria-label'=>Yii::t('yii','创建账户'),
                                    'data-pjax'=>'0',
                                ];
                                return Html::a('<span class="glyphicon glyphicon-align-justify"></span>',$url,$options);
                            }
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

