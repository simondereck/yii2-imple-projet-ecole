<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 23/02/2020
 * Time: 14:40
 */
?>
<div>
    <div>Bonjour <?= $model->name ?>,</div>
    <div>Je vous félicite que votre demande d'inscription est bien validé.</div>

    <div>Nom: <?= $model->name ?></div>
    <div>Prénom: <?= $model->display_name ?></div>
    <div>Numéro d'étudiant: <?= $model->id ?></div>
    <div>Login: <?= $model->email ?></div>
    <div>Mot de passe: <?= $model->password ?></div>
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
