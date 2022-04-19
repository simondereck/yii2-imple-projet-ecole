<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 25/11/2019
 * Time: 14:35
 */
use yii\widgets\LinkPager;
?>

<div class="actualites">

    <?php if ($datas){
        foreach ($datas as $topKey=>$top){
            ?>
            <div class="actualite-item" data-content-id="<?php echo $top->id;?>">
                <div class="actualite-pic">
                    <img src="<?php echo $top->cover;?>">
                </div>
                <div class="actualite-item-content">
                    <div class="actualite-item-content-title">
                        <?php echo $top->title;?>
                    </div>
                    <div class="actualite-item-content-text">
                        <?php echo $top->text;?>
                    </div>
                    <div class="actualite-item-content-suite"><a>lire la suite -> </a></div>
                </div>
            </div>
            <?php
        }
    }?>

    <div class="actualites-pagination">
        <?php
            echo LinkPager::widget([
            'pagination' => $pagination,
            ]);
        ?>
    </div>

</div>

<script>
    $('.actualite-item').on('click',function () {
       var id = $(this).attr("data-content-id");
       window.location.href = "index.php?r=vie/detail&id="+id;
    });
</script>

<style>
    body{
        background: whitesmoke;
    }

    .actualites{
        width: 90vw;
        margin: 20px auto 20px;
        font-size: 1vw;
        padding: 10px;
    }

    .actualite-item{
        margin: 10px;
        display: inline-block;
        width: 26vw;
        height: 19vw;
        position: relative;
    }

    .actualite-pic img{
        width: 26vw;
        height: 19vw;
        position: relative;
    }

   .actualite-pic img{
       object-fit: cover;
   }



    .actualites-pagination{
        display: block;
        width: 70vw;
    }


    .actualite-item-content{
        position: absolute;
        bottom: 0;
        background-color: #1b6d85;
        width: 26vw;
        color: whitesmoke;
        z-index: 400;
        font-size: 2vw;
        height: 4vw;
        transition: 0.3s;
    }

    .actualite-item-content-title{
        font-size: 14px;
        padding: 1vw;
        overflow: hidden;
        text-align: center;
    }

    .actualite-item-content-text{
        display: none;
        overflow: hidden;
        width: 26vw;
        padding: 10px;
        height: 0vw;
    }


    .actualite-item-content:hover .actualite-item-content-text{
        font-size: 12px;
        display: block;
        padding: 10px;
        height: 12vw;
        overflow: hidden;
    }

    .actualite-item-content:hover .actualite-item-content-suite{
        display: block;
        position: absolute;
        bottom: 0;
        width: 100%;
        text-align: right;
    }

    .actualite-item-content-suite a{
        width: 100%;
        padding: 10px;
    }

    .actualite-item-content:hover{
        height: 19vw;
        cursor: pointer;
    }

    .actualite-item-content-suite{
        padding: 0.5vw;
        font-size: 1vw;
        color: whitesmoke;
        cursor: pointer;
        height: 2vw;
        display: none;
        width: 100%;
        text-align: right;
    }

    .actualite-item-content-suite a {
        color: whitesmoke;

    }


</style>
