<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 15/12/2019
 * Time: 16:57
 */
?>


<div class="art">
    <div class="top-bar-img">
        <img src="../../images/programe/header_page.jpg" />
        <div>Arts et Médias</div>
    </div>
    <div class="art-description">
        <p>
            Le tourisme restera certainement l'un des moteurs économiques les plus importants du monde.
            La gestion du tourisme international est une majeure innovante qui offre aux étudiants une éducation
            de qualité et un bon espace de développement de carrière. Cette majeure travaille en étroite
            collaboration avec l'industrie dans l'enseignement pour s'assurer que nos étudiants sont
            connectés au monde réel.
        </p>
        <p>
            Cette majeure propose des cours de gestion de voyage, de planification de voyage,
            de gestion d'agence de voyage, de gestion d'hôtel, de marketing, de marketing en ligne,
            de planification et de promotion de projets culturels, de gestion de projet, d'histoire européenne,
            d'histoire de l'art, d'applications multimédias et d'autres.
        </p>
    </div>

    <div class="art-item">

        <div class="art-item-info">
            <h4>Caractéristiques de cette spécialité:</h4>
            <ul>
                <li>
                    Les étudiants de 32 pays étudient actuellement la gestion du tourisme international.
                </li>
                <li>
                    Les cours sont dispensés par 5 professeurs expérimentés.
                </li>
                <li>
                    Les étudiants peuvent bénéficier d’un échange à l’étranger ou participer à un «grand voyage»
                    en troisième année académique.
                </li>
                <li>
                    Les visites touristiques européennes sont proposées pendant les études.
                </li>
                <li>
                    L’enseignement se concentre sur le développement du tourisme durable.
                </li>
            </ul>

        </div>
        <div class="art-item-img">
            <img src="../../images/programe/bda1.jpg" />
        </div>
    </div>
    <div class="art-item">
        <div class="art-item-img">
            <img src="../../images/programe/bda2.jpg" />
        </div>
        <div class="art-item-info">
            <h4>Cours professionnels BAC1-3</h4>
            <h5>Cours professionnels:</h5>
            <p>1. Marché stratégique et fonctionnement</p>
            <p>2. Gestion d'entreprise et fonctionnement du projet</p>
            <p>3. Publicité et communication opérationnelle</p>
            <p>4. Négociations et techniques stratégiques</p>
            <p>5. Tourisme du patrimoine culturel</p>
            <p>6. Économie d'entreprise</p>
            <p>7. Gestion des ressources humaines</p>
            <p>8. Économie du développement</p>
            <p>9. Droit fiscal international</p>
            <p>10. Coopération économique internationale et droit international de l'investissement</p>


            <h5>Cours de base professionnelle:</h5>
            <p>1. Gestion du marché touristique</p>
            <p>2. Gestion de projets de tourisme mondial</p>
            <p>3. Gestion de projets multiculturels</p>

            <h5>Cours publics professionnels:</h5>
            <p>1. Économie internationale</p>
            <p>2. Anglais des affaires</p>
            <p>3. Français des affaires</p>
            <p>4. Planification de carrière</p>

            <h4>Cours professionnels BAC4-5</h4>

            <h5>Cours de base professionnelle:</h5>
            <p> Mise en œuvre et exécution du projet - Plan d'affaires</p>
            <p> Gestion du marché international</p>
            <p> Gestion de projets touristiques</p>

            <h5>Cours professionnels:</h5>
            <p> Développement et commercialisation du marché touristique</p>
            <p> Droit administratif et du tourisme européen</p>
            <p> Gestion de projets multiculturels</p>

            <h5>Cours publics professionnels:</h5>
            <p>1. Économie internationale</p>
            <p>2. Anglais des affaires</p>
            <p>3. Français des affaires</p>
            <p>4. Planification de carrière</p>
        </div>

    </div>
    <div class="art-item">

        <div class="art-item-info">
            <h4>Remarques:</h4>
            <ul>
                <li>
                    Pour tous les étudiants BAC + 4 / BAC + 5, 3 à 6 mois de stage à temps plein doivent être effectués
                    après chaque année de cours théorique.
                </li>
                <li>La période de stage se situe de préférence entre mai et octobre de chaque année.</li>
                <li>Les étudiants BAC + 4 doivent rédiger un rapport de stage après le stage.</li>
                <li>
                    Les étudiants BAC + 5 doivent rédiger une thèse après le stage et compléter la soutenance après la remise de la thèse.
                </li>
            </ul>

            <h4>Programmes:</h4>
            <ul>
                <li>L’inscription se déroule au printemps et en automne de chaque année.</li>
                <li>Cours de printemps: mi-février de chaque année.</li>
                <li>Cours d'automne: mi-octobre chaque année.</li>
            </ul>

            <h4>Avantages:</h4>
            <ul>
                <li>Chaque classe contient au maximum 20 étudiants.</li>
                <li>
                    Professeurs expérimentés : ils viennent des grandes écoles et des universités publiques. Ayant de riches expériences en enseignement,
                    une grande flexibilité et de  la patience, ils sont particulièrement adaptés aux étudiants étrangers qui ont envie de commencer leurs
                    études à l'université.
                </li>
                <li>
                    Horaires flexibles: cours intensifs 2-3 jours par semaine, adaptés aux étudiants qui travaillent à temps ou qui sont en stage.
                </li>
                <li>
                    L’IPLME propose les conventions de stage pour permettre aux étudiants de pratiquer les connaissances dans les entreprises.
                </li>
            </ul>
            <p><a href="../../images/pdf/programme+Arts+et+Médias.pdf">En savoir plus</a></p>

        </div>
        <div class="art-item-img">
            <img src="../../images/programe/bda3.jpg" />
        </div>
    </div>
</div>

<script>
    $('.nav-art').on('click','span',function () {
        let url = $(this).attr('data-url');
        window.location = url;
    });
</script>

<style>
    body{
        background-color: whitesmoke;

    }

    .art{
        margin: 20px auto 10vw;
        background-color: white;
        width: 60vw;
        font-size: 1vw;
    }
    .art h4{
        font-size: 1.5vw;
        font-weight: bold;
    }
    .art h5{
        font-size: 1.25vw;
    }
    .nav-art{
        background-color: #31567C;
        color: white;
        overflow: scroll;
        display: flex;
        -ms-overflow-style: none;
    }

    .nav-art span {
        display: inline-block;
        padding: 1vw;
        font-size: 1.25vw;
        list-style: none;
        position: relative;
        text-align: center;
    }

    .nav-art span:hover{
        background-color: rgba(0,0,0,0.3);
        cursor: pointer;
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

    img {
        object-fit: cover;
    }


    .art-description{
        padding: 2vw;
        background-color: #1b6d85;
        color: white;
    }



    .art-item{
        display: flex;
    }

    .art-item-info,.art-item-img,.art-item-img img{
        width: 30vw;
    }

    .art-item-info{
        padding: 2vw;
    }

    .art-item-img img{
        height: 100%;
    }

    ::-webkit-scrollbar {
        display: none;
    }

</style>
