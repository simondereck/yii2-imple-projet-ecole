<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 09/03/2020
 * Time: 19:14
 */
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\helpers\Html;

NavBar::begin([
    'brandLabel' =>  Html::img('../../images/iplme/logo.png', ['alt'=>Yii::$app->name,'height'=>'60px']),
    'brandUrl' => '../../iplme/web/index.php?r=site/index',
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
        'style'=>'background-color:#122130;height:80px;line-height:80px;font-size:1.25vw;'
    ],
]);
$menuItems = [
    ['label' => 'Home', 'url' => ['../../iplme/web/index.php?r=site/index']],
];

$menuItems = [
    ['label'=>'Notre École','url'=>"../../iplme/web/index.php?r=ecole/presentation"],
    ['label'=>'Vie De Compus','url'=>"../../iplme/web/index.php?r=vie/index"],
    ['label'=>'Cours en Ligne','url'=>'../../iplme/web/index.php?r=cours/index'],
    ['label'=>'Entreprise','url'=>'../../iplme/web/index.php?r=entreprise/cooperation'],
//    ['label'=>"Formulaire D'inscription",'url'=>'index.php?r=inscription/index'],
    ['label'=>'Contactez-nous','url'=>'../../iplme/web/index.php?r=ecole/contact'],
    ['label' => 'Mon compte', 'url'=>'../../admin/web/index.php?r=site/index'],
//    [
//        'label'=> Html::img('../../images/iplme/fr.jpg', ['alt'=>'zh','height'=>'18px']),
//        'url'=>'index.php?r=site/langue'
//    ]
];


echo Nav::widget([
    'options' => [
        'class' => 'navbar-nav navbar-right',
    ],
    'encodeLabels' => false,
    'items' => $menuItems,

]);
NavBar::end();
?>

