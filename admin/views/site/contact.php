<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 16/01/2020
 * Time: 21:46
 */
use yii\helpers\Html;
$this->title = "Contactez nous";
?>



<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>
    <div>
        Si vous voulez contacter nous:
        <a class="sendMail" href="mailto:info@iplme.org">info@iplme.org.</a>
    </div>

</main>


<style>

    .sendMail:link{
        color: yellowgreen;
    }

    .sendMail:hover,.sendMail:visited,.sendMail:active{
        color: orange;
    }

</style>
