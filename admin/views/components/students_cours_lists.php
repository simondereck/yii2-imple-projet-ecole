<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 18/03/2020
 * Time: 15:47
 */
use yii\helpers\Html;
$this->title = "Télécharger";

?>
<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>
    <div class="float-right">
        <?php
            foreach ($cours as $cour){
                ?>
                <div class="cour-item">
                    <div class="cour-img"><img src="<?= $cour["image"] ?>"/></div>
                    <div class="cour-contain">
                        <div class="cour-name"><?= $cour["name"] ?></div>
                        <div class="cour-description"><?= $cour["description"] ?></div>
                        <div><?= Html::button('détail',['class'=>'bttn btn-warning detail',"data-id"=>$cour["id"]]) ?></div>
                    </div>
                </div>
            <?php }
        ?>
    </div>

</main>

<script>
    $(".detail").on('click',function () {
       var id = $(this).attr("data-id");
       window.location.href = "index.php?r=components/detail&id="+id;
    });
</script>

<style>
    .cour-item{
        display: flex;
        width: 70vw;
        border: 1px solid whitesmoke;
        background-color: whitesmoke;

        margin-bottom: 10px;
    }

    .cour-contain{
        padding: 20px;
    }

    .cour-name{
        text-align: center;
        font-size: 2vw;
    }


    .cour-description{

        margin-top: 20px;
        margin-bottom: 20px;
    }

    .cour-item:hover{
        box-shadow: 5px 0 10px rgba(0,0,0,0.3);
    }
</style>


