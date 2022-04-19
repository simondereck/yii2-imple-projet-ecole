<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 15/03/2020
 * Time: 01:43
 */
use yii\helpers\Html;
use common\models\IpProfessuer;
$this->title = "vorte rdv"
?>

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>
    <div class="info">
        Le <?php echo $model->stime;?> , vous avez rendez-vous avec
        <?php echo IpProfessuer::findOne(["id"=>$model->pid])->name;?>,
        si vous souhaitez annuler le réengagement, cliquez
        <?= Html::a('ici','index.php?r=rdv/delete_rdv&id='.$model->id) ?>
    </div>

</main>

<style>
    .info{
        font-size: large;
        padding: 20px;
        line-height: 2;
        background-color: whitesmoke;
    }
</style>
