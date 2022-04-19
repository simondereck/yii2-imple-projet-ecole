<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 05/12/2019
 * Time: 14:50
 */
?>



<div class="marketing">
    <div class="top-bar-img">
        <img src="../../images/programe/header_page.jpg" />
        <div>Marketing d’entreprise</div>
    </div>
    <div class="marketing-item">
        <div class="marketing-item-info">
            <h4>Objectifs de la formation</h4>
            <p>
                La spécialité «Marketing» propose une formation visant à permettre aux étudiants de s’intégrer
                à l’avenir dans les secteurs de l’analyse du marché, de la la communication, de la négociation
                et de la gestion de la relation client. Adaptée aux nouveaux enjeux professionnels,
                la formation accorde une place importante aux nouvelles technologies, en particulier à la
                communication numérique.
            </p>
            <p>
                De plus, cette formation propose une ouverture aux cultures internationales afin de mieux analyser
                les préférences des consommateurs en recourant aux outils d’analyse qualitatifs et aussi quantitatifs.
            </p>
        </div>
        <div class="marketing-item-img">
            <img src="../../images/programe/bda1.jpg" />
        </div>
    </div>
    <div class="marketing-item">
        <div class="marketing-item-img">
            <img src="../../images/programe/bda2.jpg" />
        </div>
        <div class="marketing-item-info">
            <h4>Programme Bachelor</h4>
            <p>
                Conformément au standard français, ce programme proposé par l’IPLME sont établis sur 3 années.
            </p>
            <p>
                Chaque année est divisée en deux périodes de cours et une période de stage validé par un rapport
                de stage qui doit se porter sur un projet professionnel déjà envisagé par l’étudiant. L’enseignement,
                d’une part, est principalement structuré autour d’un tronc commun en sciences économiques, sociales et
                de gestion; d’autre part, est dédié à la maîtrise des nouvelles technologies de la communication et de l’analyse.
            </p>
            <h4>Programme Master of Science (MSC)</h4>
            <p>
                Ce programme est positionné à bac+4. L’année est divisée en deux périodes de cours et une période de
                stage validé par un rapport de stage.
            </p>
            <h4>
                Programme MBA (bac+5)
            </h4>
            <p>
                L’année de MBA se divise en deux périodes de cours et une période de stage. Après développer son expertise,
                l’étudiant peut approfondir sa formation en DBA.
            </p>
        </div>
    </div>

</div>

<script>
    $('.nav-marketing').on('click','span',function () {
        let url = $(this).attr('data-url');
        window.location = url;
    });
</script>
<style>
    body{
        background-color: whitesmoke;
    }
    .nav-marketing{
        background-color: #31567C;
        color: white;
        overflow: scroll;
        display: flex;
        -ms-overflow-style: none;
    }


    .nav-marketing span {
        display: inline-block;
        padding: 1vw;
        font-size: 1.25vw;
        list-style: none;
        position: relative;
        text-align: center;
    }

    .nav-marketing span:hover{
        background-color: rgba(0,0,0,0.3);
        cursor: pointer;
    }

    .marketing{
        background-color: white;
        width: 60vw;
        margin: 20px auto 10vw;
        font-size: 1vw;
    }

    .marketing h4{
        font-size: 1.5vw;
        font-weight: bold;
    }

    .top-bar-img , .top-bar-img img{
        width: 100%;
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

    .marketing img{
        object-fit: cover;
    }

    .marketing-item{
        display: flex;
    }

    .marketing-item-img ,
    .marketing-item-img img,
    .marketing-item-info{
        width: 30vw;
    }

    .marketing-item-info{
        padding: 2vw;
    }

    .marketing-item-img img{
        height: 100%;
    }

    ::-webkit-scrollbar {
        display: none;
    }
</style>
