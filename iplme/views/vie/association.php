<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 25/11/2019
 * Time: 15:25
 */

?>

<div class="association">
    <div class="top-bar-img">
        <img src="../../images/iplme/association.jpg" />
        <div>Services d’étudiant</div>
    </div>
    <div class="association-items">
        <div class="association-item">
            <div class="association-item-description">

                <ul>
                    <li>
                        Visa étudiant
                    </li>
                    <li>
                        Contrat d’habitation
                    </li>
                    <li>
                        Ouverture d’un compte bancaire
                    </li>
                    <li>
                        Allocation CAF
                    </li>
                    <li>
                        LA convention de stage d’une durée de 6 mois
                        ( cette convention est délivrée par nos universités partenaires aux étudiants inscrits à leurs cours afin qu’ils
                        compensent l’apprentissage théorique par les expériences pratiques )
                    </li>
                </ul>

            </div>
            <div class="association-item-img">
                <img src="../../images/iplme/association_1.jpg"/>
            </div>
        </div>

    </div>
</div>

<style>
    body{
        background-color: whitesmoke;

    }

    .association{
        margin: 20px auto 20px;
        background-color: white;
        width: 60vw;
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


    .association-item{
        display: flex;
    }

    .association-item-img,
    .association-item-img img,
    .association-item-description{
        width: 30vw;
    }

    .association-item-img img{
        height: 100%;
    }

    .association-item-description{
        font-size: 1vw;
        padding: 2vw;
    }

    h4{
        font-weight: bold;
        font-size: 1.5vw;
    }
</style>
