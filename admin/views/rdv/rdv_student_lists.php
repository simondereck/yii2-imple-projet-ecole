<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 15/03/2020
 * Time: 01:56
 */
use yii\helpers\Html;
use yii\grid\GridView;
use common\models\IpProfessuer;
use common\models\Admin;
$this->title = "学生 rdv 列表"
?>

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>
    <div style="margin:10px">
        <?= Html::a('返回','index.php?r=rdv/index',['class'=>'btn btn-warning back']) ?>
    </div>
    <div>
        <?=
        GridView::widget([
            "dataProvider" => $dataProvider,
            "columns" => [
                'id',
                [
                    'label'=>'学生',
                    'attribute'=>'sid',
                    'value'=>function($model){
                        return Admin::findOne(["id"=>$model->sid])->name;
                    }
                ],
                [
                    'label'=>'教授',
                    'attribute'=>'pid',
                    'value'=>function($model){
                        return IpProfessuer::findOne(['id'=>$model->pid])->name;
                    }
                ],

                [
                    'label'=>'status',
                    'attribute'=>'status',
                    'value'=>function($model){
                        return $model->status==0?"失效":"正在进行";
                    }
                ],

                [
                    'label'=>'预约时间',
                    'attribute'=>'stime',
                ],
                'ctime',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template'=>'{update_rdv_student},{delete_rdv_student}',
                    'buttons'=>[
                        'update_rdv_student'=>function($url,$model,$key)
                        {
                            $options=[
                                'title'=>Yii::t('yii','更新'),
                                'aria-label'=>Yii::t('yii','更新'),
                                'data-pjax'=>'0',
                            ];
                            return Html::a('<span class="glyphicon glyphicon-edit"></span>',$url,$options);
                        },
                        'delete_rdv_student'=>function($url,$model,$key)
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
        ]);
        ?>
    </div>
</main>

