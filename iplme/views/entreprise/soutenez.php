<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 24/11/2019
 * Time: 19:33
 */
//soutenez?>


<div class="soutenez">
    <div class="top-bar-img">
        <img src="../../images/iplme/apercu.jpg" />
        <div>Travaillez à l’IPLME</div>
    </div>
    <div class="soutenez-info">
        <section class="grid-x color-white">
            <div class="padding-top-3 cell" style="">
                <p>
                    Si vous avez envie de travailler à l’IPLME en tant qu’enseignant(e) ou professeur(e),
                    vous pouvez nous transmettre votre CV et lettre de motivation par courriel :
                    <a class="sendMail" href="mailto:info@iplme.org">info@iplme.org.</a>
                </p>
            </div>
        </section>
    </div>
</div>


<style>
    body{
        background-color: whitesmoke;
    }

    .soutenez{
        width: 60vw;
        margin: 20px auto 20px;
        background-color: #31567C;
        color: white;
    }

    .top-bar-img,.top-bar-img img{
        width: 60vw;
        height: 20vw;
        position: relative;
    }
    .top-bar-img img{
        object-fit: cover;
    }

    .top-bar-img div{
        font-size: 2vw;
        color: white;
        padding: 2vw;
        position: absolute;
        top: 0;
        z-index: 200;
    }

    .soutenez-info{
        padding: 2vw;
        font-size: 1vw;
    }

    .sendMail:link{
        color: yellowgreen;
    }

    .sendMail:hover,.sendMail:visited,.sendMail:active{
        color: orange;
    }

</style>
