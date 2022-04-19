<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 24/11/2019
 * Time: 15:17
 */
?>

<div class="vision">
    <div class="top-bar-img">
        <img src="../../images/iplme/vision.jpg"/>
        <div>Vision de la mission</div>
    </div>
    <div class="vision-info">
        <div class="cell" >
            <h4>Valeur </h4>
            <p>L'IPLME adhère à trois valeurs fondamentales：</p>
            <ul>
                <li>Découvrir</li>
                <li>Réflechir</li>
                <li>Réussir</li>
            </ul>
            <p>L'IPLME a considérablement amélioré son développement et son expansion internationale grâce à la coopération entre le projet d'école et la communauté d'affaires domestiques et internationale et les cercles académiques.</p>
        </div>
        <div class="cell" >
            <h4>Vision </h4>
            <p>L' IPLME souhaite devenir l'une des 20 meilleures Grandes écoles de France d'ici 2025. Nous continuerons à mettre en œuvre un enseignement qui répond aux besoins et aux attentes des étudiants tout en travaillant à résoudre des problèmes urgents en matière de développement des affaires et de développement social.<br>Nous améliorerons l'enseignement et la recherche en matière d'innovation, de responsabilité sociale des entreprises et de finance afin d'élargir la visibilité internationale dans les domaines respectifs.</p>
        </div>
        <div class="cell">
            <h4>Mission </h4>
            <p>Notre école encourage les innovateurs responsables. En coopération externe, elle explore et diffuse continuellement de nouvelles connaissances et les intègre à l'enseignement pour inspirer de nouvelles pratiques commerciales.</p>
        </div>
    </div>
</div>


<style>
    body{
        background-color: whitesmoke;
    }

    .vision{
        width: 60vw;
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

    img{
        object-fit: cover;
    }

    .vision-info{
        background-color: white;
        padding: 2vw;
        display: flex;
        justify-content: space-around;
    }

    .cell{
        width: 18vw;
    }

    h4{
        font-size: 1.5vw;
        font-weight: bold;
    }
</style>
