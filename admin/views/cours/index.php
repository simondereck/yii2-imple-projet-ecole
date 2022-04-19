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
$this->title = "专业课程";
?>


<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>

    <div style="margin:10px">
        <a class="btn btn-success" href="index.php?r=cours/create_cours">添加课程</a>
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
                    'descript',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template'=>'{delete_cours},{update_cours}',
                        'buttons'=>[
                            'delete_cours'=>function($url,$model,$key)
                            {
                                $options=[
                                    'title'=>Yii::t('yii','删除请求'),
                                    'aria-label'=>Yii::t('yii','删除请求'),
                                    'data-pjax'=>'0',
                                ];
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>',$url,$options);
                            },
                            'update_cours'=>function($url,$model,$key)
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

