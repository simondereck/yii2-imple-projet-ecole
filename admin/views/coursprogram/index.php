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
use yii\helpers\Json;
$this->title = "年级课程管理";
?>




<main role="main">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>

    <div style="margin:10px">
        <a class="btn btn-success" href="index.php?r=coursprogram/create_coursprogram" >添加年级课程</a>
    </div>

    <div class="float-right">
        <div>
            <?=
            GridView::widget([
                //'filterModel' => $searchModel,
                "dataProvider" => $dataProvider,
                "columns" => [
                    'id',
                    [
                        'label'=>'year',
                        'value'=> function($model){
                            return ArrayDatas:: getCoursProgramYear()[$model->year];
                        }
                    ],
                    [
                        'label'=>'faculty',
                        'value'=> function($model){
                            return ArrayDatas:: getFaculty()[$model->faculty];
                        }
                    ],
                    'ctime',
                    [
                        'label'=>'ness',
                        'format'=>'html',
                        'value'=>function($model){
                            $nesses = Json::decode($model->ness);
                            $nessStr = "";
                            if ($nesses){
                                foreach ($nesses as $key => $va){
                                    if (is_array($va)){
                                        $nessStr .= $key." : ".$va['score']."<br>";
                                    }else{
                                        $nessStr .= $key." : ".$va."<br>";
                                    }
                                }
                            }
                            return $nessStr;
                        }
                    ],
                    [
                        'label'=>'opt',
                        'format'=>'html',
                        'value'=>function($model){
                            $optes = Json::decode($model->opt);
                            $optStr = "";
                            if ($optes){
                                foreach ($optes as $key => $va){
                                    if (is_array($va)){
                                        $optStr .= $key." : ".$va['score']."<br>";
                                    }else{
                                        $optStr .= $key." : ".$va."<br>";
                                    }
//                                    $optStr .= $key." : ".$va."<br>";
                                }
                            }
                            return $optStr;
                        }
                    ],
                    [
                        'label'=>'session',
                        'value'=> function($model){
                            return ArrayDatas:: getSession()[$model->session];
                        }
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template'=>'{choix_cours_program},{delete_cours_program},{update_cours_program}',
                        'buttons'=>[
                            'choix_cours_program'=>function($url,$model,$key)
                            {
                                $options=[
                                    'title'=>Yii::t('yii','更新选课'),
                                    'aria-label'=>Yii::t('yii','更新选课'),
                                    'data-pjax'=>'0',
                                ];
                                return Html::a('<span class="glyphicon glyphicon-tree-deciduous"></span>',$url,$options);
                            },
                            'delete_cours_program'=>function($url,$model,$key)
                            {
                                $options=[
                                    'title'=>Yii::t('yii','删除请求'),
                                    'aria-label'=>Yii::t('yii','删除请求'),
                                    'data-pjax'=>'0',
                                ];
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>',$url,$options);
                            },
                            'update_cours_program'=>function($url,$model,$key)
                            {
                                $options=[
                                    'title'=>Yii::t('yii','更新更新学分'),
                                    'aria-label'=>Yii::t('yii','更新学分'),
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

<style>
    main{
        padding: 2vw;
    }
    .float-right{
        overflow: scroll;
    }


</style>

