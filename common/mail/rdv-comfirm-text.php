<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 23/02/2020
 * Time: 15:17
 */
use common\models\IpProfessuer;
use yii\helpers\Html;
use common\models\IpRdvStudent;
$rdv = IpRdvStudent::findOne(["id"=>$rid]);
$professeur = IpProfessuer::findOne(["id"=>$rdv->pid]);
?>


Bonjour  <?= Yii::$app->getUser()->identity->name ?>,

Je vous informe que vous avez reçu un RDV pour la date du <?= $rdv->stime ?> avec <?= $professeur->name ?>.
Enfin de valider ou annuler votre RDV, je vous invite à consulter votre RDV dans votre
compte Iplme en cliquant <?= Html::a('ici','index.php?r=rdv/index')?>.



Bien cordialement,

******************************************
IPLME
118-120, RUE DE L'ABBE GROULT,
75015 PARIS
Tél: +33 (0)9 82 38 90 78
Fax: +33 (0)9 82 41 29 83
Mail: info@iplme.org
Site: www.iplme.org
*******************************************
