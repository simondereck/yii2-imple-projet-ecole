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
    ['label'=>'Notre École','url'=>"index.php?r=ecole/presentation"],
    ['label'=>'Vie De Compus','url'=>"index.php?r=vie/index"],
    ['label'=>'Cours en Ligne','url'=>'index.php?r=cours/index'],
    ['label'=>'Entreprise','url'=>'index.php?r=entreprise/cooperation'],
//    ['label'=>"Formulaire D'inscription",'url'=>'index.php?r=inscription/index'],
    ['label'=>'Contactez-nous','url'=>'index.php?r=ecole/contact'],
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

