<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 09/03/2020
 * Time: 19:14
 */
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\bootstrap\Nav;

NavBar::begin([
    'brandLabel' =>  Html::img('../../images/iplme/logo.png', ['alt'=>Yii::$app->name,'height'=>'50px']),
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
        'style'=>'background-color:#122130;height:80px;line-height:80px;font-size:1.25vw;'
    ],
]);
$menuItems = [
    ['label' => 'Home', 'url' => ['/site/index']],
];

$menuItems = [
    ['label'=>'学院简介','url'=>"index.php?r=ecole/index"],
    ['label'=>'企业关系','url'=>'index.php?r=entreprise/cooperation'],
    ['label'=>'校园生活','url'=>"index.php?r=vie/index"],
    ['label'=>'网络课程','url'=>'index.php?r=cours/index'],
    ['label'=>'在线申请','url'=>'index.php?r=inscription/index'],
    ['label' => '账户登录', 'url'=>'../../admin/web/index.php?r=site/index'],
//    [
//        'label'=> Html::img('../../images/iplme/fr.jpg', ['alt'=>'zh','height'=>'18px']),
//        'url'=>'index.php?r=site/langue'
//    ]
];

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'encodeLabels' => false,
    'items' => $menuItems,

]);
NavBar::end();
?>
