<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 24/11/2019
 * Time: 15:17
 */
?>
<div class="presentation">
    <div class="top-bar-img">
        <iframe src="https://www.youtube.com/embed/FDB8acF_I28" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="presentation-info">
        <div class="presentation-item">
            <div class="presentation-item-description">
                <div class="cell color-white" style="">
                    <h4 class="section-title text-">Qu’est-ce que l’IPLME ?</h4>
                    <p>L’Institut préparatoire intitulé IPLME est un établissement technique d'enseignement supérieur, créé en 2011 par trois associés. Dès le départ, la volonté de ses fondateurs, diplômés des grandes écoles et de double culture franco-chinoise, a été d’établir un lien vers l’Asie, en particulier dans le domaine des sciences économiques et de gestion.</p>
                </div>
            </div>
            <div class="presentation-item-img"><img src="../../images/iplme/present_1.jpg" /></div>
        </div>
        <div class="presentation-item">
            <div class="presentation-item-img"><img src="../../images/iplme/present_2.jpg" /></div>
            <div class="presentation-item-description">
                <div class="cell color-white" style="">
                    <h4 class="section-title text-">Présentation</h4>
                    <section>
                        <div class="padding-left-0 padding-top-0 cell" style="">
                            <p>Renforcée depuis par des partenariats et des échanges culturels entretenus auprès d’universités renommées dans toute l’Asie du Sud-est, nos formations, de connaissances internationale, offrent depuis deux ans à ses étudiants français un profil unique et complet, pour ce qui nous semble parfaitement répondre aux incontournables enjeux présents et futurs de la mondialisation.</p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="presentation-item-end">
            <div class="cell" style="">
                <h4 class="section-title text-">IPLME</h4>
                <div class="tabs-content" data-tabs-content="">
                    <p>En quelques années, l’IPLME s’est donc agrandi, construit en un groupe composé de plusieurs centres d’enseignements et de recherches. </p>
                    <p> Notre intention  est de prendre en compte les différentes phases de la vie étudiante, jusqu’à la constitution d’un projet professionnel, avec une possibilité d’intégrer une entreprise située en Asie du Sud-est. Nos programmes s’adressent ainsi, à la fois, aux bacheliers, aux étudiants français et asiatiques, aux chercheurs souhaitant professionnaliser leur savoir entre la France et l’Asie, aux professionnels souhaitant établir des liens économiques et commerciaux entre l’Asie et la France.</p>
                    <p>Le groupe IPLME a mis en place un dernier pôle de formation  qui s’adresse aux professionnels et futurs professionnels, afin de développer un programme riche et original, intitulé « Chinese Business Culture ».Destiné aux cadres et futurs cadres, aux chefs et futurs chefs d’entreprise, ou à tout autre personne souhaitant à court, moyen ou long terme se tourner vers les marchés asiatiques, ou profiter des différentes potentialités offertes par l’essor sans précédent de ces nouveaux partenaires.</p>
                    <p>L’IPLME (Institut Privé de Luxe et de Management d’Entreprise) est un établissement d’enseignement supérieur privé, autorisé par la chancellerie. En tant qu’école de commerce supérieure, avec une gamme complète de talents de la gestion d’entreprise, offre la formation du commerce international et des langues étrangères.</p>
                    <p>Depuis la création de l’école, nous améliorons continuellement la qualité de l’enseignement, formons des talents internationaux provenant de plus de 30 pays du monde : France, Grande-Bretagne, Allemagne, Suède, Espagne, États-Unis, Australie, Mexique, Brésil, Chine, Corée, Vietnam, Thïlande, Mali, Togo, etc.</p>
                    <p>Adhérant à trois principes fondamentales : découvrir, réfléchir, réussir, et assumant les responsabilités de réaliser l’innovation en matière de méthodes d’enseignement, d’élargir la coopération externe avec des écoles de commerce et d’offrir la formation de qualité, l’IPLME a pour ambition de devenir l’une des 20 meilleures Grandes Écoles en France d’ici 2025.</p>


                </div>
            </div>
        </div>
    </div>
</div>


<style>
    body{
        background-color: whitesmoke;
    }

    .presentation{
        margin: 20px auto 20px;
        width: 60vw;
        background-color: white;
        text-align: center;
        font-size: 1vw;
    }
    /*iframe{*/
        /*width: 100%;*/
        /*height: 100%;*/
    /*}*/
    .top-bar-img,iframe{
        width: 60vw;
        height: 30vw;
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

    img{
        object-fit: cover;
    }


    .presentation-item{
        display: flex;
    }

    .presentation-item-description,.presentation-item-img,.presentation-item-img img{
        width: 30vw;
        height: 20vw;
    }

    .presentation-item-description,.presentation-item-end{
        padding: 2vw;
    }

    .presentation-item-end{
        margin-top: 2vw;
        text-align: left;
    }
</style>
