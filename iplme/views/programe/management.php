<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 05/12/2019
 * Time: 14:51
 */
?>
<div class="management">
    <div class="top-bar-img">
        <img src="../../images/programe/header_page.jpg" />
        <div>Management du Luxe et Tourisme culture</div>
    </div>
    <div class="management-item">
        <div class="management-item-info">
            <h4>Aperçu de la formation</h4>
            <p>
                Focalisée sur les relations commerciales entre la France et la Chine, cette formation
                «Management et marketing du luxe et de la mode, art et tourisme culturel», permet aux
                étudiants d’équiper des connaissances concernant les secteurs du luxe, de la mode,
                de l’art et de la culture. En même temps, elle donne une perception des cultures internationales,
                du nouveau marché et des clients potentiels afin de mieux analyser les préférences des consommateurs.
            </p>
            <p>
                Sous la direction de Madame Stéphanie Perrot, responsable pédagogique du Management du Luxe à l’IPLME,
                les cours sont dispensés par des enseignants, des enseignants-chercheurs et des professionnels.
                La pédagogie privilégie le travail en groupe et met en valeur l'autonomie des étudiants et une
                perspective ouverte sur le monde économique.
            </p>
            <p>
                L’objectif de cette formation est de rendre les étudiants capable de créer sa propre marque ou de former
                les futurs actifs / chefs dans les secteurs relatifs ( le luxe, la mode, l’art et le tourisme).
            </p>
        </div>
        <div class="management-item-img">
            <img src="../../images/programe/bda1.jpg" />
        </div>
    </div>
    <div class="management-item">
        <div class="management-item-img">
            <img src="../../images/programe/bda2.jpg" />
        </div>
        <div class="management-item-info">
            <h4>Programme Bachelor</h4>
            <p>
                Conformément au standard français, ce programme proposé par l’IPLME sont établis sur 3 années.
                Chaque année est divisée en deux périodes de cours et une période de stage validé par un rapport
                de stage qui doit se porter sur un projet professionnel déjà envisagé par l’étudiant.
            </p>
            <p>
                L’enseignement, d’une part, est principalement structuré autour d’un tronc commun en sciences économiques,
                sociales et de gestion; d’autre part, est dédié à la compréhension fine du marché du luxe, de la mode,
                de l’art et du tourisme culturel.
            </p>
            <p>
                - Savoir-faire, savoir-vivre et traditions…
            </p>
            <p>
                - Quelles en sont les caractéristiques principales ？

            </p>
            <p>
                - Comment bien s’évoluer dans ce milieu en connaissant les codes et les usages ？
            </p>
            <h4>Programme Master of Science (MSc)</h4>
            <p>
                Le Master of Science est positionné à bac+4. L’année est divisée en 2 périodes de cours et 1 période
                de stage et rédaction d’un mémoire de stage.L’étudiant construit son projet professionnel dans le
                secteur du luxe, de la mode, de l’art ou du tourisme culturel.
            </p>

            <h4>Programme MBA (bac+5)</h4>
            <p>
                L’année de MBA se divise en deux périodes de cours et une période de stage pour rendre l’étudiant capable
                de développer pleinement son expertise.
            </p>
            <h4>Comprendre le produit</h4>
            <p>
                Élaboration, communication, marketing, approche du public.
            </p>
            <h4>Cours pratiques</h4>
            <p>
                Processus de la fabrication du produit.
            </p>

        </div>
    </div>
    <div class="management-item">
        <div class="management-item-info">
            <h4>Atelier « PRATIQUES DU LUXE »</h4>
            <p>Pour mettre en évidence et diagnostiquer les difficultés / problèmes rencontrés par des étudiants dans
                l’apprentissage et permettre aux étudiants d’accéder à ce milieu aisément, IPLME propose un atelier
                ludique dont les thèmes sont très variés (la mode, la cosmétique, et l’hôtellerie, etc.) à travers une
                série d’activités diversifiés, par exemple, la simulation des cas réels et le jeux de rôles.
            </p>
            <h4>Atelier « GASTRONOMIE »</h4>
            <p>
                À travers des thèmes différents (cuisine, œnologie, règles du savoir-faire à table, agriculture, marketing),
                cet atelier a pour objectif de développer la capacité d’appréciation pour comprendre les enjeux des arts de
                la table.
            </p>
        </div>
        <div class="management-item-img">
            <img src="../../images/programe/bda3.jpg" />
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

    .management{
        background-color: white;
        width: 60vw;
        margin: 20px auto 10vw;
        font-size: 1vw;
    }

    .management h4{
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

    .management img{
        object-fit: cover;
    }

    .management-item{
        display: flex;
    }

    .management-item-img ,
    .management-item-img img,
    .management-item-info{
        width: 30vw;
    }

    .management-item-info{
        padding: 2vw;
    }

    .management-item-img img{
        height: 100%;
    }

    ::-webkit-scrollbar {
        display: none;
    }
</style>
