<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 27/03/2020
 * Time: 09:11
 */

use yii\helpers\Html;
use yii\grid\GridView;
use common\widgets\ArrayDatas;
$this->title = "学生列表";

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
                    'firstname',
                    [
                        'label'=>'gender',
                        'value'=>function($model){
                            return ArrayDatas::getGender()[$model->gender];
                        }
                    ],
                    'telephone',
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
                        },
                    ],
                    'ctime',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template'=>'{detail},{update_score},{delete_score}',
                        'buttons'=>[
                            'detail'=>function($url,$model,$key)
                            {
                                $options=[
                                    'title'=>Yii::t('yii','成绩单详情'),
                                    'aria-label'=>Yii::t('yii','成绩单详情'),
                                    'data-pjax'=>'0',
                                ];
                                return Html::a('<span class="glyphicon glyphicon-align-justify"></span>',$url,$options);
                            },
                            'update_score'=>function($url,$model,$key)
                            {
                                $options=[
                                    'title'=>Yii::t('yii','更新请求'),
                                    'aria-label'=>Yii::t('yii','更新请求'),
                                    'data-pjax'=>'0',
                                ];
                                return Html::a('<span class="glyphicon glyphicon-edit"></span>',$url,$options);
                            },
                            'delete_score'=>function($url,$model,$key)
                            {
                                $options=[
                                    'title'=>Yii::t('yii','删除请求'),
                                    'aria-label'=>Yii::t('yii','删除请求'),
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
