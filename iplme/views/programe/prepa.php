<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 03/12/2019
 * Time: 20:24
 */
?>
<div class="prepa">
    <div class="top-bar-img">
        <img src="../../images/programe/programme.jpg"/>
        <div>PRÉPA</div>
    </div>
    <div class="prepa-item">
        <div class="prepa-item-description">
            <h4>Horaire</h4>
            <p>
                Le nombre total de cours du projet par année académique est de 520 heures,
                et les cours sont organisés sur 26 semaines. Chaque année académique est
                divisée en deux semestres (octobre-janvier: janvier-juin).
                Les cours du premier semestre visent à améliorer le niveau de français et
                à comprendre la culture française.Le deuxième semestre vise à améliorer
                les compétences linguistiques, en mettant l'accent sur les méthodes professionnelles
                et la formation axée sur l'emploi.
            </p>
            <h4>Niveau professionnel</h4>
            <ul>
                <li>PREPA 1</li>
                <li>PREPA 3</li>
                <li>PREPA 5</li>
            </ul>
            <h4>Conditions d'entrée</h4>
            <ul>
                <li>Demandeur titulaire d'un diplôme BTS - DEUG - DUT (BAC + 2 ou équivalent)</li>
                <li>Le candidat soumet les documents pertinents et réussit le test, c'est-à-dire l'entrevue</li>
            </ul>
        </div>
        <div class="prepa-item-img">
            <img src="../../images/programe/prepa_0.jpg" />
        </div>
    </div>
    <div class="prepa-item">
        <div class="prepa-item-img">
            <img src="../../images/programe/prepa_1.jpg" />
        </div>
        <div class="prepa-item-description">
            <h4>Cours connexes et introduction professionnell</h4>
            <p>
                Premier semestre
            </p>
            <ul>
                <li>
                    Français des affaires
                </li>
                <li>
                    Anglais des affaires
                </li>
                <li>
                    Renfort français
                </li>
                <li>
                    Culture et enseignement multimédia
                </li>
                <li>
                    Pratique stratégique préliminaire
                </li>
                <li>
                    Guide du tuteur et planification de l'emploi
                </li>
            </ul>
            <h4>Deuxième semestre</h4>
            <ul>
                <li>
                    Gestion et organisation d'entreprise
                </li>
                <li>
                    Français des affaires
                </li>
                <li>
                    Marketing
                </li>
                <li>
                    Gestion financière
                </li>
                <li>
                    Stratégie de marketing commercial
                </li>
                <li>
                    Pratique stratégique préliminaire
                </li>
                <li>
                    Stratégie d'entreprise
                </li>
                <li>
                    Planification personnelle de carrière
                </li>
            </ul>
        </div>
    </div>
    <div class="prepa-item">
        <div class="prepa-item-description">
            <h4>Introduction</h4>
            <p>
                Une année scolaire est divisée en deux semestres, soit un total de 506 heures.
                Mode d'enseignement: Le contenu de l'enseignement est divisé en enseignement
                de la langue française et en enseignement professionnel: à la fin du semestre,
                un cours FLE de trois mois ou un stage est requis.
            </p>
            <h4>Cours obligatoire</h4>
            <p>20 heures par semaine cours de français</p>
            <h4>Cours professionnel facultatif</h4>
            <p>
                Choisissez trois options: Marketing Foundation, Economics Foundation, Anglais des affaires,
                Anglais des affaires, Droit des sociétés, Droit des affaires, Gestion financière,
                Management Foundation et Corporate Management.
            </p>
            <h4>Documents à fournir pour une demande d'admission</h4>
            <p>
                Diplôme d'études secondaires, une photo standard, une copie d'un titre de séjour valide,
                une transcription valide, un certificat en langue française, un formulaire d'inscription
                complété, une lettre d'inscription ou de transfert, et un CV personnel.
            </p>
        </div>
        <div class="prepa-item-img">
            <img src="../../images/programe/prepa_2.jpg" />
        </div>
    </div>
</div>


<style>
    body{
        background-color: whitesmoke;
    }
    .prepa{
        width: 60vw;
        background-color: white;
        font-size: 1vw;
        margin: 20px auto 20px;
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

    .top-bar-img img{
        object-fit: cover;
    }

    .prepa-item{
        display: flex;
    }

    .prepa-item h4{
        font-size: 1.5vw;
        font-weight: bold;
    }

    .prepa-item-description{
        padding: 2vw;
        width: 30vw;
    }

    .prepa-item-img,.prepa-item-img img{
        width: 30vw;
    }

    .prepa-item-img img{
        object-fit: cover;
        height: 100%;
    }
</style>
