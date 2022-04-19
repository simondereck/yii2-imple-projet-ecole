<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 19/03/2020
 * Time: 18:25
 */
//\common\widgets\PublicFunctionUnion::printData($item);
?>

<div class="detail">
    <div class="title"><h2><?= $item->title ?></h2></div>
    <div class="cover"><img src="<?= $item->cover ?>"></div>
    <div class="message">
        <?= $item->text ?>
    </div>
    <div class="bottom-time"><?= $item->ctime ?></div>
</div>

<style>
    body{
        background: whitesmoke;
    }

    .detail{
        width: 70vw;
        margin: 20px auto 20px;
        background-color: white;
        font-size: 1vw;
        padding: 20px;
    }


    .cover,.title {
        margin: 10px auto 10px;
        text-align: center;
    }

    .cover img{
        margin-top: 5vw;
        max-width: 60vw;
        object-fit: cover;
    }


    .message{
        text-align: left;
        font-size: 1.25vw;
        padding: 5vw 10vw 5vw 10vw;

    }


    .bottom-time{
        text-align: right;
        font-size: 1vw;
    }



</style>
