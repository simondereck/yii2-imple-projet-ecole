<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 21/03/2020
 * Time: 19:54
 */
use common\widgets\ArrayDatas;
use yii\helpers\Html;
use common\models\Cours;
$this->title = "Télécharger détail";

?>

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>

    <div class="cours-detail">
        <div class="cours-detail-img"><img src="<?php echo $model->image;?>"/></div>
        <div class="cours-detail-right">
            <div class="cours-detail-name">
<!--                --><?//= ArrayDatas::getFaculty()[$model->faculty]; ?>
            </div>
            <div class="cours-detail-info">
                <div class="cours-detail-title">
                    <?php $cour = Cours::findOne([$model->cours]);?>
                    <?= $cour->name; ?>
                </div>
                <div>
                    <?= $cour->descript; ?>
                </div>
            </div>

        </div>
    </div>

    <div class="cours-description">
        <div class="cours-description-title">Détail du cours</div>
        <div class="cours-description-detail">
            <?php echo $model->description;?>
        </div>
        <div class="cours-detail-list">
            <?php
            if ($items){
                foreach ($items as $key => $item){
                    ?>
                    <div class="cours-detail-list-item" data-category ="<?= $model->id; ?>" data-id="<?= $item->id; ?>">
                        <div class="cours-detail-list-item-name">
                            <span class="glyphicon glyphicon-book"></span>
                            <text><?= $item->name;?></text>
                        </div>
                        <div class="cours-detail-list-item-time">
                            <text><?= $item->ctime;?></text>
                            <span class="glyphicon glyphicon-download"></span>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</main>

<script>
    $(".cours-detail-list-item").on('click',function () {
        var id = $(this).attr("data-id");
        var ca = $(this).attr("data-category");
        window.location.href = "index.php?r=components/download&id="+id + "&category="+ca;
    });

</script>

<style>
    body{
        background-color: whitesmoke;
    }

    .cours-detail, .cours-description{
        background-color: white;
        margin-bottom: 10px;
        padding: 10px;
    }

    .cours-detail{
        display: flex;
    }

    .cours-detail-img,.cours-detail-img img{
        width: 250px;
        height: 200px;
    }

    .cours-detail-img img{
        object-fit: cover;
    }


    .cours-detail-right{
        margin-left: 10px;
    }

    .cours-detail-right div{
        margin-bottom: 10px;
    }

    .cours-detail-info{
        font-size: 1.5vw;
        color: grey;
    }
    .cours-detail-info *{
        margin-right: 10px;
    }

    .cours-detail-title{
        font-size: 2vw;
        color: black;
    }

    .cours-detail-name,.cours-detail-fee{
        font-size: 20px;
        font-weight: bold;
    }

    .cours-detail-button-group button{
        background-color: orangered;
        color: white;
        border: none;
        padding: 10px;
    }

    .cours-detail-button-group button:hover{
        background-color: orange;
    }

    .cours-description-title{
        width: fit-content;
        padding: 5px;
        background-color: #122b40;
        color: white;
        border-radius: 2px;

    }

    .cours-description-detail{
        margin-top: 10px;
    }

    .cours-detail-list{
        margin-top: 1vw;
        padding: 1vw;
        background-color: whitesmoke;
    }

    .cours-detail-list-item{
        display: flex;
        justify-content: space-between;
        padding: 5px;
        background-color: white;
        margin-bottom: 5px;
    }

    .cours-detail-list-item:hover{
        box-shadow: 0px 5px 3px rgba(0,0,0,0.2);
        background-color: #1b6d85;
        color: white;
    }
    .cours-detail-list-item-name span{
        margin-right: 20px;
    }
    .cours-detail-list-item-time text{
        margin-right: 20px;
    }

</style>
<script>
    $(".demander").on('click',function () {
        alert("123");
        window.location.href = "../../admin/web/index.php?r=site/index";
    });
</script>
