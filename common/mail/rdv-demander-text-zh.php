<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 23/02/2020
 * Time: 15:03
 */

use common\models\IpProfessuer;
$professeur = IpProfessuer::findOne(["id"=>$rdv->pid]);

?>

您好 <?= Yii::$app->getUser()->identity->name ?>，

您已经提交了和<?= $professeur->name ?>于<?= $rdv->stime ?>的RDV申请。
您的申请已经成功保存。

祝您愉快

******************************************
IPLME
118-120, RUE DE L'ABBE GROULT,
75015 PARIS
Tél: +33 (0)9 82 38 90 78
Fax: +33 (0)9 82 41 29 83
Mail: info@iplme.org
Site: www.iplme.org
*******************************************

