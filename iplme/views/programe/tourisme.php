<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 15/12/2019
 * Time: 16:57
 */
?>

<div class="tourisme">
    <div class="top-bar-img">
        <img src="../../images/programe/header_page.jpg" />
        <div>Management et Gestion d’Hôtellerie</div>
    </div>
    <div class="tourisme-description">
        <p>
            Cette spécialité vise à permettre aux étudiants d’avoir des connaissances théoriques solides et de savoir mettre en
            pratique les théories pour qu’ils puissent s’épanouir dans les domaines spécifiques.
        </p>
    </div>

    <div class="tourisme-item">
        <div class="tourisme-item-img">
            <img src="../../images/programe/bda1.jpg" />
        </div>
        <div class="tourisme-item-info">
            <h4>Matières principales</h4>
            <p>1.	Économie</p>
            <p>2.	Entrepreneuriat et gestion </p>
            <p>3.	Droit des affaires</p>
            <p>4.	Stratégie du développement de l’entreprise</p>
            <h4>Matières de pratique</h4>
            <p>1.	Politiques et réglementations touristiques</p>
            <p>2.	Gestion d'agences de voyages internationaux</p>
            <p>3.	Esthétique touristique</p>
            <p>4.	Gestion des ressources humaines de l'hôtel</p>
            <p>5.	Gestion moderne des services hôteliers</p>
            <p>6.	Planification et développement du tourisme</p>
            <p>7.	Marketing touristique international</p>
            <h4>Matières Publiques</h4>
            <p>1.	Économie internationale</p>
            <p>2.	Anglais des affaires</p>
            <p>3.	Français des affaires</p>
            <p>4.	Planification de carrière</p>
        </div>

    </div>
    <div class="tourisme-item">
        <div class="tourisme-item-info">
            <h4>Remarques</h4>
            <ul>
                <li>
                    Pour tous les étudiants BAC + 4 / BAC + 5, 3 à 6 mois de stage à temps plein doivent être
                    effectués après chaque année de cours théorique.
                </li>
                <li>La période de stage se situe de préférence entre mai et octobre de chaque année.</li>
                <li>Les étudiants BAC + 4 doivent rédiger un rapport de stage après le stage.</li>
                <li>
                    Les étudiants BAC + 5 doivent rédiger une thèse après le stage et compléter la soutenance après la remise de la thèse.
                </li>
            </ul>
            <h4>Programmes</h4>
            <p>L’inscription se déroule au printemps et en automne de chaque année.</p>
            <ul>
                <li>Cours de printemps: mi-février de chaque année.</li>
                <li>Cours d'automne: mi-octobre chaque année.</li>
            </ul>
            <h4>Avantages</h4>
            <ul>
                <li>
                    Chaque classe contient au maximum 20 étudiants.
                </li>
                <li>
                    Professeurs expérimentés : ils viennent des grandes écoles et des universités publiques.
                    Ayant de riches expériences en enseignement, une grande flexibilité et de  la patience,
                    ils sont particulièrement adaptés aux étudiants étrangers qui ont envie de commencer leurs études
                    à l'université.
                </li>
                <li>
                    Horaires flexibles: cours intensifs 2-3 jours par semaine, adaptés aux étudiants qui travaillent
                    à temps ou qui sont en stage.
                </li>
                <li>
                    L’IPLME propose les conventions de stage pour permettre aux étudiants de pratiquer les connaissances
                    dans les entreprises.
                </li>
                <li>
                    Les étudiants qui s’inscrivent aux cours de spécialité peuvent profiter des cours FLE gratuitement
                    en améliorant le niveau du français.
                </li>
            </ul>
            <p><a href="../../images/pdf/managment+hôtelier.pdf">En savoir plus</a></p>
        </div>
        <div class="tourisme-item-img">
            <img src="../../images/programe/bda3.jpg" />
        </div>
    </div>


</div>

<script>
    $('.nav-tourisme').on('click','span',function () {
        let url = $(this).attr('data-url');
        window.location = url;
    });
</script>

<style>
    body{
        background-color: whitesmoke;

    }

    .tourisme{
        margin: 20px auto 10vw;
        background-color: white;
        width: 60vw;
        font-size: 1vw;
    }
    .tourisme h4{
        font-size: 1.5vw;
        font-weight: bold;
    }

    .nav-tourisme{
        background-color: #31567C;
        color: white;
        overflow: scroll;
        display: flex;
        -ms-overflow-style: none;
    }

    .nav-tourisme span {
        display: inline-block;
        padding: 1vw;
        font-size: 1.25vw;
        list-style: none;
        position: relative;
        text-align: center;
    }

    .nav-tourisme span:hover{
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


    .tourisme-description{
        padding: 2vw;
        background-color: #1b6d85;
        color: white;
    }



    .tourisme-item{
        display: flex;
    }

    .tourisme-item-info,.tourisme-item-img,.tourisme-item-img img{
        width: 30vw;
    }

    .tourisme-item-info{
        padding: 2vw;
    }

    .tourisme-item-img img{
        height: 100%;
    }

    ::-webkit-scrollbar {
        display: none;
    }

</style>
