<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 05/12/2019
 * Time: 14:50
 */
?>


<div class="logistique">
    <div class="top-bar-img">
        <img src="../../images/programe/header_page.jpg" />
        <div>Logistique et transports internationaux</div>
    </div>
    <div class="logistique-item">
        <div class="logistique-item-info">
            <h4>Objectifs de la formation</h4>
            <p>
                La spécialité «Logistique et informatique» propose une formation visant à permettre aux étudiants
                de s’intégrer à l’avenir dans les secteurs du transport ou de l’analyse des données et d’optimisation.
                Adaptée aux nouveaux enjeux professionnels, la formation accorde une place importante aux nouvelles technologies,
                en particulier à l’informatique et aux mathématiques.
            </p>
            <p>
                Il est donc indispensable, à part des connaissances fondamentales dans les domaines du commerce,
                de la gestion et de la mercatique, d’acquérir une bonne maîtrise des langues étrangères, de l’environnement international
                et des nouveaux outils du travail.
            </p>
        </div>
        <div class="logistique-item-img">
            <img src="../../images/programe/bda1.jpg" />
        </div>
    </div>
    <div class="logistique-item">
        <div class="logistique-item-img">
            <img src="../../images/programe/bda2.jpg" />
        </div>
        <div class="logistique-item-info">
            <h4>Programme Bachelor</h4>
            <p>
                Conformément au standard français, ce programme proposé par l’IPLME sont établis sur 3 années.
                Chaque année est divisée en deux périodes de cours et une période de stage validé par un rapport
                de stage qui doit se porter sur un projet professionnel déjà envisagé par l’étudiant. L’enseignement,
                d’une part, est principalement structuré autour d’un tronc commun en sciences économiques,
                sociales et de gestion; d’autre part, est dédié à la maîtrise des nouvelles technologies de la communication
                et de l’analyse et du transport.
            </p>

            <h4>Programme Master of Science (MSC)</h4>
            <p>
                Ce programme est positionné à bac+4. L’année est divisée en deux périodes de cours et une période de
                stage validé par un rapport de stage dans lequel l’étudiant doit construire son projet professionnel en
                commerce et affaires internationales.
            </p>
            <h4>Programmes MBA (bac+5)</h4>
            <p>
                L’année de MBA se divise en deux périodes de cours et une période de stage. Après développer son expertise,
                l’étudiant peut approfondir sa formation en DBA.
            </p>
        </div>
    </div>

</div>
<script>
    $('.nav-bba').on('click','span',function () {
        let url = $(this).attr('data-url');
        window.location = url;
    });
</script>

<style>
    body{
        background-color: whitesmoke;
    }
    .nav-bba{
        background-color: #31567C;
        color: white;
        overflow: scroll;
        display: flex;
        -ms-overflow-style: none;

    }


    .nav-bba span {
        display: inline-block;
        padding: 1vw;
        font-size: 1.25vw;
        list-style: none;
        position: relative;
        text-align: center;
    }

    .nav-bba span:hover{
        background-color: rgba(0,0,0,0.3);
        cursor: pointer;
    }

    .logistique{
        background-color: white;
        width: 60vw;
        margin: 20px auto 10vw;
        font-size: 1vw;
    }

    .logistique h4{
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

    .logistique img{
        object-fit: cover;
    }

    .logistique-item{
        display: flex;
    }

    .logistique-item-img ,
    .logistique-item-img img,
    .logistique-item-info{
        width: 30vw;
    }

    .logistique-item-info{
        padding: 2vw;
    }

    .logistique-item-img img{
        height: 100%;
    }

    ::-webkit-scrollbar {
        display: none;
    }


</style>
