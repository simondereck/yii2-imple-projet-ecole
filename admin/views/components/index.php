<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 22/01/2020
 * Time: 22:27
 */

use yii\helpers\Html;
use yii\grid\GridView;
use common\widgets\ArrayDatas;
use yii\helpers\Json;
use common\models\Cours;
$this->title = "课件管理"
?>
<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>

    <div style="margin:10px">
        <a class="btn btn-success" href="index.php?r=components/create_course_ware">添加课件信息</a>
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
                            'label'=>'image',
                            'format' => 'html',
                            'value' => function ($model) {
                                return Html::img($model->image, ['width' => '60px']);
                            },
                    ],
                    [
                            'label'=>'name',
                            'value'=>function($model){
                                $coursName = Cours::findOne(["id"=>$model->cours]);
                                if ($coursName){
                                    return $coursName->name;
                                }
                                return "";
                            }
                    ],
                    [
                            'attribute'=>'session',
                            'format' => 'html',
                            'value'=>function($model){
                                $session = Json::decode($model->session);
                                $sessionStr = "";

                                foreach ($session as $item){
                                    $sessionStr .= ArrayDatas::getSession()[$item]."<br>";
                                }
                                return $sessionStr;
                            }
                    ],
                    [
                            'attribute'=>'year',
                            'format' => 'html',
                            'value'=>function($model){
                                $year = Json::decode($model->year);
                                $yearStr = "";

                                foreach ($year as $item){
                                    $yearStr .= ArrayDatas::getCoursProgramYear()[$item]."<br>";
                                }
                                return $yearStr;
                            }
                    ],
                    [
                            'attribute'=>'faculty',
                            'format' => 'html',
                            'value'=>function($model){
                                $faculty = Json::decode($model->faculty);
                                $facultyStr = "";
                                foreach ($faculty as $item){
                                    $facultyStr .= ArrayDatas::getFaculty()[$item]."<br>";
                                }
                                return $facultyStr;
                            }
                    ],
                    'description',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template'=>'{course_ware_detail_list},{update_course_ware}',
                        'buttons'=>[
                            'course_ware_detail_list'=>function($url,$model,$key)
                            {
                                $options=[
                                    'title'=>Yii::t('yii','上传课件'),
                                    'aria-label'=>Yii::t('yii','上传课件'),
                                    'data-pjax'=>'0',
                                ];
                                return Html::a('<span class="glyphicon glyphicon-book"></span>',$url,$options);
                            },
                            'update_course_ware'=>function($url,$model,$key)
                            {
                                $options=[
                                    'title'=>Yii::t('yii','更新请求'),
                                    'aria-label'=>Yii::t('yii','更新请求'),
                                    'data-pjax'=>'0',
                                ];
                                return Html::a('<span class="glyphicon glyphicon-edit"></span>',$url,$options);
                            },
                        ]
                    ],
                ]
            ]);
            ?>
        </div>
    </div>

</main>


<style>
    main{
        padding: 2vw;
    }
    .float-right{
        overflow: scroll;
    }


</style>
