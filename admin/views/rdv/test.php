<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 23/02/2020
 * Time: 18:56
 */
use common\models\Admin;
use common\models\IpRdv;

$uid = Yii::$app->user->getId();
$user = Admin::findOne(["id"=>$uid]);
$rid = 1;
$rdv = IpRdv::findOne(["id"=>$rid]);
$professeur = Admin::findOne(["id"=>$rdv->professeur]);
?>

<div>
    <div>Bonjour <?= $user->name ?>,</div>
    <div>
        Vous avez demandé un RDV avec <?= $professeur->display_name." ".$professeur->name ?> pour
        la date de <?= $rdv->sdate." ".$rdv->stime ?> - <?= $rdv->edate." ".$rdv->etime ?> en ligne.</div>
    <div>
        Je vous informe que votre demande est bien enregistrée, et vous allez recevoir un mail de comfirmation dès votre demande est comfirmée.
    </div>

    <div>Bien cordialement,</div>

    <div>IPLME</div>
</div>

