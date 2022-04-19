<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 24/11/2019
 * Time: 12:59
 */
use common\widgets\ArrayDatas;
use yii\helpers\Json;
use common\models\Cours;

?>
<div class="cours">
    <div class="cours-en-top">
        <div class="cours-top-img">
            <img src="../../images/iplme/cours_en_ligne.jpg"/>
            <div>Cours en Ligne</div>
        </div>
        <div class="cours-description">
            <p>
                Les cours en ligne vous permettent de suivre une ou plusieurs formations qui vous intéressent
                et d’obtenir un certificat après que vous accomplissez votre cours en ligne. Pour vous vous
                inscrire, il faut remplir un formulaire de demande de la formation que vous choisissez, et
                nous vous enverrons le programme de cours selon votre choix par courriel.
                Il faut noter que certaines formations vous demandent le stage, si vous avez la demande d’un
                stage pour votre formation en ligne, veuillez aller à la page «Vie de campus — Service étudiant ».
            </p>
        </div>
    </div>


    <div class="cours-items">
        <?php
            if ($models&&count($models)>0){
                foreach ($models as $i=>$value){
                    if ($i%3==0){
                        echo '<div class="cours-items-row">';
                    }
                    ?>
                        <div class="cours-item" data-id="<?php echo $value->id;?>" >
                            <div class="cours-item-selection">
                                <div class="cours-item-img">
                                    <img src="<?php echo $value->image;?>"/>
                                </div>
                                <?php
                                $cours = Cours::findOne(["id"=>$value->cours]);
                                ?>
                                <div class="cours-item-name"><?= $cours->name; ?></div>
                            </div>
                            <hr class="cours-item-line" />
                            <div class="cours-item-selection cours-bottom">
                                <div class="cours-item-status"><?= $value->description;?></div>
                                <div class="item-button">En savoir plus <text>></text></div>
                            </div>
                        </div>
                    <?php
                    if ($i%3==2){
                        echo "</div>";
                    }
                }
            }
        ?>


    </div>
</div>

<script>
    $(".cours-items").on('click','.cours-item',function () {
        let id = $(this).attr("data-id");
        window.location = "index.php?r=cours/detail&id="+id;
    });
</script>

<style>
    body{
        background-color: whitesmoke;
    }

    .cours{
        width: 60vw;
        margin: 20px auto 10vw;
    }

    .cours-en-top{
        background-color: white;
    }

    .cours-top-img,.cours-top-img img{
        width: 100%;
        height: 20vw;
        position: relative;
    }

    .cours-top-img div{
        padding: 2vw;
        font-size: 2vw;
        color: white;
        position: absolute;
        top: 0;
        z-index: 200;
    }


    img{
        object-fit: cover;
    }


    .cours-description{
        padding: 2vw;
    }

    .cours-description section p{
        margin-bottom: 2vw;
    }

    .cours-items{
        margin-top: 10px;
        background-color: white;
    }

    .cours-items-row{
        display: flex;
        justify-content: flex-start;
    }

    .cours-item{
        display: inline-block;
        width: 18vw;
        /*justify-content: space-between;*/
        background-color: white;
        margin-bottom: 1vw;
        margin-top: 1vw;
        font-size: 1vw;
        box-shadow: 0px 0px 2px 1px rgba(0, 0, 0, .2);
        margin-left: 1.5vw;
        overflow:hidden;
    }



    .cours-item img{
        width: 6vw;
        height: 6vw ;
        border-radius: 50%;
        border: 4px solid #F2F2F2;
    }

    .cours-item-name,.cours-item-status,.cours-item-starts{
        padding-left: 5px;
        padding-right: 5px;
    }


    .cours-item:hover{
        box-shadow: 5px 5px 2px 1px rgba(0, 0, 0, .2);;
    }

    @media (max-width: 767px) {
        .cours-top-img,.cours-top-img img{
            height: 40vw;
        }

        .cours-description{
            padding: 4vw;
        }

        .cours-description section p{
            margin-bottom: 4vw;
        }

        .cours-items-row{
            display: block;
        }
        .cours-item{
            display: block;
            height: 60vw;
            width: 100%;
            background-color: white;
            margin:0;
            margin-bottom: 2vw;
        }

        .cours-item img{
            width: 100%;
            /*height: 40vw ;*/
            border-radius: 50%;

        }

        .cours-item-name,.cours-item-status,.cours-item-starts{
            padding-left: 2vw;
            padding-right: 5vw;
        }

    }

    .cours-item-selection{
        display: flex;
        padding: 1vw;
    }

    .cours-item-line{
        margin-top: 3px;
        margin-bottom: 3px;
    }

    .cours-bottom{
        justify-content: space-between;
        align-items: center;
    }

    .item-button{
        font-size: 12px;
        display: flex;
        align-items: center;
    }

    .item-button text{
        color: white;
        background-color: black;
        border-radius: 50%;
        width: 18px;
        height: 18px;
        text-align: center;
        padding: 2px;
        margin-left: 10px;
        font-size: 12px;
        line-height: 14px;
    }


    .item-button text:hover{
        color: black;
        background-color: lightgray;
        cursor: pointer;
    }

    .item-button:hover{
        cursor: pointer;
        color: grey;
    }

</style>
