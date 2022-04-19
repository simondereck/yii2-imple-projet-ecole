<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 23/05/2019
 * Time: 18:42
 */


/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 09/05/2019
 * Time: 19:00
 */
use yii\helpers\Html;
use yii\grid\GridView;
$this->title = "账户列表";

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
                    'name',
                    'email',
                    [
                            'attribute'=>'types',
                            'value'=>function($model){
                               if ($model->types===1){
                                   return "教授";
                               }else if ($model->types===2||$model->types===3){
                                   return "学生";
                               }else if ($model->types===0){
                                   return "管理员";
                               }
                            }
                    ],
                    [
                        'attribute'=>'permission',
                        'value'=>function($model){
                            if ($model->types===0){
                                if ($model->permission==1){
                                    return "普通管理员";
                                }else{
                                    return "超级管理员";
                                }
                            }else{
                                return "普通账户";
                            }

                        }
                    ],
                    [
                        'attribute'=>'block',
                        'value'=>function($model){
                            if ($model->block==1){
                                return "保存";
                            }else{
                                return "赋权";
                            }

                        }
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template'=>'{delete_admin},{update_admin}',
                        'buttons'=>[
                            'delete_admin'=>function($url,$model,$key)
                            {
                                $options=[
                                    'title'=>Yii::t('yii','删除管理员'),
                                    'aria-label'=>Yii::t('yii','删除管理员'),
                                    'data-pjax'=>'0',
                                ];
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>',$url,$options);
                            },
                            'update_admin'=>function($url,$model,$key)
                            {
                                $options=[
                                    'title'=>Yii::t('yii','更新管理员'),
                                    'aria-label'=>Yii::t('yii','更新管理员'),
                                    'data-pjax'=>'0',
                                ];
                                return Html::a('<span class="glyphicon glyphicon-edit"></span>',$url,$options);
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
