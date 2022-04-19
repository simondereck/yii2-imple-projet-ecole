<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 06/03/2020
 * Time: 12:51
 */

use yii\helpers\Html;
use yii\grid\GridView;
use common\widgets\ArrayDatas;
$this->title = "学生生活";

?>

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>
    <div style="margin:10px">
        <?= Html::a("添加新闻","index.php?r=article/create",['class'=>'btn btn-success'])?>
    </div>
    <div class="float-right">
        <?=
        GridView::widget([
            "dataProvider" => $dataProvider,
            "columns" => [
                'id',
                [
                    'label'=>'cover',
                    'format' => 'html',
                    'value' => function ($model) {
                        return Html::img($model->cover, ['width' => '120px']);
                    },
                ],
                'title',
                [
                        'label'=>'status',
                        'attribute'=>'status',
                        'value'=>function($model){
                            return ArrayDatas::getArticleStatus()[$model->status];
                        }
                ],
                'utime',
                'ctime',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template'=>'{update_article},{delete_article}',
                    'buttons'=>[
                        'update_article'=>function($url,$model,$key)
                        {
                            $options=[
                                'title'=>Yii::t('yii','更新'),
                                'aria-label'=>Yii::t('yii','更新'),
                                'data-pjax'=>'0',
                            ];
                            return Html::a('<span class="glyphicon glyphicon-edit"></span>',$url,$options);
                        },
                        'delete_article'=>function($url,$model,$key)
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
