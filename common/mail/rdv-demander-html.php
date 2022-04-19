<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 23/02/2020
 * Time: 15:02
 */
use common\models\IpProfessuer;
$professeur = IpProfessuer::findOne(["id"=>$rdv->pid]);

?>

<div>
    <div>Bonjour <?= Yii::$app->getUser()->identity->name ?>,</div>
    <div>
        Vous avez demandé un RDV avec <?= $professeur->name ?> pour
        la date de <?= $rdv->stime ?>  en ligne.</div>
    <div>
        Je vous informe que votre demande est bien enregistrée.
    </div>

    <div>Bien cordialement,</div>

</div>

<div>
    ******************************************
    IPLME
    118-120, RUE DE L'ABBE GROULT,
    75015 PARIS
    Tél: +33 (0)9 82 38 90 78
    Fax: +33 (0)9 82 41 29 83
    Mail: info@iplme.org
    Site: www.iplme.org
    *******************************************
</div>
