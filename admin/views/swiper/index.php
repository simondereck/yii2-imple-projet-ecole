<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 06/03/2020
 * Time: 00:15
 */

use yii\helpers\Html;
use yii\grid\GridView;
$this->title = "滚动广告";
?>

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>
    <div style="margin:10px">
        <?= Html::a("添加广告","index.php?r=swiper/create",['class'=>'btn btn-success'])?>
    </div>
    <div class="float-right">
        <?=
        GridView::widget([
            "dataProvider" => $dataProvider,
            "columns" => [
                'id',
                [
                    'label'=>'path',
                    'format' => 'html',
                    'value' => function ($model) {
                        return Html::img($model->path, ['width' => '360px']);
                    },
                ],
                'ctime',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template'=>'{update_swiper},{delete_swiper}',
                    'buttons'=>[
                        'update_swiper'=>function($url,$model,$key)
                        {
                            $options=[
                                'title'=>Yii::t('yii','更新'),
                                'aria-label'=>Yii::t('yii','更新'),
                                'data-pjax'=>'0',
                            ];
                            return Html::a('<span class="glyphicon glyphicon-edit"></span>',$url,$options);
                        },
                        'delete_swiper'=>function($url,$model,$key)
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

