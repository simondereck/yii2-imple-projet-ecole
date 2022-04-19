<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 23/02/2020
 * Time: 14:46
 */
use common\widgets\ArrayDatas;
?>

<div>
    <div>Bonjour <?= $model->name ?>,</div>
    <div>
        Vous avez posé la candidature au FLE de niveau <?= ArrayDatas::getLevel()[$model->level] ?> en ligne.

        Je vous informe que votre demande est bien enregistrée et va être étudie par notre commission d'admission.
    </div>
    <div>
        Vous allez recevoir un mail de comfirmation après la validation de votre demande.
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
