<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 28/01/2020
 * Time: 14:07
 */
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\widgets\ArrayDatas;
use yii\grid\GridView;
use yii\helpers\Json;
$this->title = "课件信息列表";

?>
<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>
    <div class="float-right">
        <?= DetailView::widget([
            'model' => $courseWare,
            'attributes'=>[
                'id',
                [
                    'attribute'=>'image',
                    'label'=>'image',
                    'format' => 'html',
                    'value' => function ($model) {
                        return Html::img($model->image, ['width' => '60px']);
                    },
                ],
                [
                    'attribute'=>'session',
                    'format'=>'html',
                    'value'=>function($model){
                        $sessions = Json::decode($model->session);
                        $sessionStr = "";
                        foreach ($sessions as $session){
                            $sessionStr .= ArrayDatas::getSession()[$session]."<br>";
                        }

                        return $sessionStr;
                    }
                ],
                [
                    'attribute'=>'year',
                    'format'=>'html',
                    'value'=>function($model){
                        $years = Json::decode($model->year);
                        $yearStr = "";
                        foreach ($years as $year){
                            $yearStr .= ArrayDatas::getCoursProgramYear()[$year]."<br>";
                        }
                        return $yearStr;
                    }
                ],
                [
                    'attribute'=>'faculty',
                    'format'=>'html',
                    'value'=>function($model){
                        $faculties = Json::decode($model->faculty);
                        $facultyStr = "";
                        foreach ($faculties as $faculty){
                            $facultyStr .= ArrayDatas::getFaculty()[$faculty]."<br>";
                        }
                        return $facultyStr;
                    }
                ],
                'description',
                'ctime',
                'utime',
                [
                    'label'=>'update',
                    'format' => 'html',

                    'value'=> function($model){
                        $url = 'index.php?r=components/update_course_ware&id='.$model->id;
                        return Html::a('<span class="btn btn-success">更新</span>',$url,[]);
                    }
                ],
            ]
        ])?>
    </div>
    <div>
        <hr>
        <div style="margin:10px">
            <a class="btn btn-success"
               href="index.php?r=components/add_course_ware_detail&id=<?php echo $courseWare->id;?>">
                添加课件
            </a>
        </div>
    </div>

    <div class="float-right">
        <?=
        GridView::widget([
            'filterModel' => $searchModel,
            "dataProvider" => $dataProvider,
            "columns" => [
                'id',
                'data_url',
                'utime',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template'=>'{delete_course_ware_detail},{update_course_ware_detail}',
                    'buttons'=>[
                        'update_course_ware_detail'=>function($url,$model,$key)
                        {
                            $options=[
                                'title'=>Yii::t('yii','更新课件'),
                                'aria-label'=>Yii::t('yii','更新课件'),
                                'data-pjax'=>'0',
                            ];
                            return Html::a('<span class="glyphicon glyphicon-edit"></span>',$url."&wid=".$model->wid,$options);
                        },
                        'delete_course_ware_detail'=>function($url,$model,$key)
                        {
                            $options=[
                                'title'=>Yii::t('yii','删除课件'),
                                'aria-label'=>Yii::t('yii','删除课件'),
                                'data-pjax'=>'0',
                            ];
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>',$url."&wid=".$model->wid,$options);
                        },
                    ]
                ],
            ]
        ]);
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


</style>
