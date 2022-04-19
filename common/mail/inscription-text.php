<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 23/02/2020
 * Time: 14:47
 */
?>

Bonjour <?= $model->name ?>,

Vous avez déposé une candidature en <?php
    if ($model->type==1){
        echo "BBA";
    }else if ($model->type==2){
        echo "MBA";
    }else if ($model->type==3){
        echo "DBA";
    }
?> en ligne.

Je vous informe que votre demande est bien enregistrée et va être étudie par notre commission d'admission.

Vous allez recevoir un mail de comfirmation après la validation de votre demande.

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
