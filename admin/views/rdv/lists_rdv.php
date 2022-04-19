<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 12/03/2020
 * Time: 16:32
 */
use yii\helpers\Html;
use yii\grid\GridView;
use common\models\IpProfessuer;
use common\widgets\ArrayDatas;
use yii\helpers\Json;
$this->title = "rdv 列表"
?>

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>
    <div style="margin:10px">
        <?= Html::a("创建教授日程","index.php?r=rdv/release_rdv",['class'=>'btn btn-success'])?>
        <?= Html::a("学生rdv列表","index.php?r=rdv/rdv_students",['class'=>'btn btn-warning'])?>
    </div>
    <div>
        <?=
        GridView::widget([
            "dataProvider" => $dataProvider,
            "columns" => [
                'id',
                [
                    'label'=>'pid',
                    'attribute'=>'pid',
                    'value'=>function($model){
                        $professuer = IpProfessuer::findOne(['id'=>$model->pid]);
                        if ($professuer){
                            return $professuer->name;
                        }
                        return "";
                    }
                ],
                [
                    'label'=>'dateArea',
                    'attribute'=>'dateArea',
                    'value'=>function($model){
                        $dateArea = Json::decode($model->dateArea,true);
                        return $dateArea[0] . " 至 " . $dateArea[1];

                    }
                ],
                [
                    'label'=>'sdate',
                    'attribute'=>'sdate',
                    'value'=>function($model){
                        $dateKeys = Json::decode( $model->sdate);
                        $dateString = "";
                        foreach ($dateKeys as $dateKey){
                            $dateString .= ArrayDatas::getRdvDate()[$dateKey]."\t";
                        }
                        return $dateString;
                    }
                ],
                [
                    'label'=>'stime',
                    'attribute'=>'stime',
                    'value'=>function($model){
                        $timeKey = Json::decode($model->stime,true);
                        return ArrayDatas::getRdvTime()[$timeKey[0]] . " -- " . ArrayDatas::getRdvTime()[$timeKey[1]];
                    }
                ],
                [
                    'label'=>'interval',
                    'attribute'=>'interval',
                    'value'=>function($model){
                        return ArrayDatas::getRdvPeriod()[$model->interval];
                    }
                ],
                'utime',
                'ctime',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template'=>'{update_rdv_professeur},{delete_rdv_professeur}',
                    'buttons'=>[
                        'update_rdv_professeur'=>function($url,$model,$key)
                        {
                            $options=[
                                'title'=>Yii::t('yii','更新'),
                                'aria-label'=>Yii::t('yii','更新'),
                                'data-pjax'=>'0',
                            ];
                            return Html::a('<span class="glyphicon glyphicon-edit"></span>',$url,$options);
                        },
                        'delete_rdv_professeur'=>function($url,$model,$key)
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
