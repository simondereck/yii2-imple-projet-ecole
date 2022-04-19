<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 24/11/2019
 * Time: 19:32
 */
?>

<div class="talent">
    <div class="top-bar-img">
        <img src="../../images/iplme/talent.jpg" />
        <div>Association sociale — Future vous</div>
    </div>
    <div class="talent-info">
        <section class="grid-x color-white">
            <div class="padding-top-3 cell" style="">
                <p>
                    En raison que l’école IPLME maintient un lien étroit avec des entreprises locales
                    et les groupes multinationaux, nos étudiants s’orientent vers les entreprises : ZTE 5/8

                    (Zhongxing Telecommunication Equipment Company Limited), HUAWEI, Les Galeries Lafayette,
                    TOTAL, EDF, CNP ASSURANCES, RENAULT, etc.
                </p>
            </div>
        </section>
    </div>
    <div class="talent-img">
        <div class="talent-img-item">
            <img src="../../images/iplme/lvmh.png"/>
            <img src="../../images/iplme/la.png"/>
            <img src="../../images/iplme/channel.jpg" />
        </div>
<!--        <div class="talent-img-item">-->
<!--            <img src="../../images/iplme/rsg.png" data-href="https://lechengeois.com" alt="兄弟科技"/>-->
<!--        </div>-->

        <div class="talent-img-item">
            <img src="../../images/iplme/re.jpg" />
            <img src="../../images/iplme/total.jpg" />
            <img src="../../images/iplme/cnp.jpg" />
        </div>
        <div class="talent-img-item">
            <img src="../../images/iplme/huawei.jpg" />
            <img src="../../images/iplme/edf.png" />
            <img src="../../images/iplme/zte.png" />
        </div>

    </div>
</div>
<script>
    $(".talent-img").on('click',"img",function () {
        let url = $(this).attr("data-href");
        if (url) {
            window.location.href = url;
        }
    });
</script>
<style>
    body{
        background-color: whitesmoke;
    }

    .talent{
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

    .top-bar-img div{
        font-size: 2vw;
        color: white;
        padding: 2vw;
        position: absolute;
        top: 0;
        z-index: 200;
    }


    .talent-info{
        padding: 2vw;
        font-size: 1vw;
    }

    .talent-img{
        margin: 2vw auto 2vw;
        background-color: white;
    }

    .talent-img img{
        height: 6vw;
        object-fit: cover;
        background-color: #1b6d85;
        display: inline-flex;
        margin: 3vw;
    }

    .talent-img-item{
        display: flex;
        justify-content: space-around;
    }

    .talent-img-item img:hover{
        cursor: pointer;
    }

</style>
