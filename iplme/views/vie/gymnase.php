<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 03/12/2019
 * Time: 20:24
 */
?>
<div class="gymnase">
    <div class="top-bar-img">
        <img src="../../images/programe/gym_top_bar.jpg" />
        <div>Forest Hill</div>
    </div>
    <div class="gymnase-description">
        <p>
            Forest Hill est un groupe de gestion d'installations sportives et hôtelières en Île-de-France.
            La société compte plusieurs établissements sportifs ainsi que d’un Parc aquatique doté d'une
            verrière et décoré sur un thème tropical. Le club propose une gamme complète de services,
            qui comprend cardio , les exercices renforcement musculaire, la détente et le bien-être….
            …….
        </p>
        <p>
            Au Forest Hill Aquaboulevard, tout a été conçu pour vous faire oublier vos ennuis et vos soucis.
            Le club Forest Hill Aquaboulevard est devenu le véritable lieu parisien de divertissements sportifs
            et ludiques. Etre Pacha est un privilège : vestiaires privés, bassin d'aquagym, sauna parc,
            plage privée de sable fin ...
        </p>
        <p>
            <a class="foresthill" data-href="../../images/pdf/foresthill.pdf">
                Télécharger la formulaire
                <img src="../../images/iplme/download.jpg" />
            </a>
        </p>
        <h3>Liste des clubs :</h3>
        <ul>
            <li>Aquaboulevard de Paris : 4 rue Louis Armand, 75015 Paris</li>
            <li>Forest Hill Versailles : 11 rue Exelmans, 78000 Versailles</li>
            <li>Forest Hill Nanterre City Form : 85 avenue François Arago, 92000 Nanterre</li>
            <li>Forest Hill Nanterre La Défense : 9 à 19 avenue de la liberté, 92000 Nanterre</li>
            <li>Forest Hill Meudon La Forêt : 40 avenue du Maréchal de Lattre de Tassigny, 92360 Meudon</li>
            <li>Forest Hill Aubervilliers : 111 avenue Victor Hugo, 93300 Aubervilliers</li>
            <li>Forest Hill Villejuif Timing : 116 rue Edouard Vaillant, 94807 Villejuif</li>
            <li>Forest Hill La Marche : 1 bis boulevard de la République, 92430 Marne la Coquette</li>
        </ul>
    </div>
</div>
<script>
    $('.gymnase-description').on('click','.foresthill',function () {
            let href = $(this).attr('data-href');
            window.open(href);
    });
</script>
<style>
    body{
        background-color: whitesmoke;
    }
    .gymnase{
        width: 60%;
        background-color: white;
        margin: 20px auto 80px;
        font-size: 1vw;
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

    .gymnase-description{
        padding: 2vw;
    }

    .gymnase-description h3{
        font-size:2vw;
        font-weight: bold;
    }

    .gymnase-description a:hover{
        cursor: pointer;
    }

    .foresthill img{
        width: 3vw;
        height: 3vw;
    }
</style>
