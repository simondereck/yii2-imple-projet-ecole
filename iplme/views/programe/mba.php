<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 03/12/2019
 * Time: 20:23
 */
?>

<div class="mba">
    <div class="top-bar-img">
        <img src="../../images/programe/header_page.jpg" />
        <div>BAC+4-5</div>
    </div>
    <div class="mba-description">
        <h4>BBA （Bachelor of Business Administration）</h4>
    </div>
    <div class="mba-item">
        <div class="mba-item-info">
            <p>
                Le niveau d’enseignement de la maîtrise vise à aider les étudiants qui connaissent déjà les bases de
                l’entreprise à mener les recherches approfondies dans un domaine spécifique. En outre, étant donné que
                les étudiants en master sont susceptibles d’entrer dans le marché du travail, un stage est donc exigé
                à la fin du deuxième et du quatrième semestre.
            </p>
            <h4> Cours principales：</h4>
            <ul>
                <li>
                    Logistique internationale internationaux
                </li>
                <li>
                    Marketing d’entreprise
                </li>
                <li>
                    Management du Luxe et Tourisme culturel
                </li>
                <li>
                    Commerce et affaires Internationales
                </li>
                <li>
                    Logistique et transports internationaux
                </li>
                <li>
                    Management et gestion d’Hôtellerie
                </li>
            </ul>
        </div>
        <div class="mba-item-img">
            <img src="../../images/programe/bda1.jpg" />
        </div>
    </div>
</div>
<script>
    $('.nav-mba').on('click','span',function () {
        let url = $(this).attr('data-url');
        window.location = url;
    });
</script>

<style>
    body{
        background-color: whitesmoke;
    }


    .nav-mba{
        background-color: #31567C;
        color: white;
        overflow: scroll;
        display: flex;
        -ms-overflow-style: none;
    }

    .nav-mba span {
        display: inline-block;
        padding: 1vw;
        font-size: 1.25vw;
        list-style: none;
        position: relative;
        text-align: center;
    }

    .nav-mba span:hover{
        background-color: rgba(0,0,0,0.3);
        cursor: pointer;
    }


    .mba{
        background-color: white;
        width: 60vw;
        margin: 20px auto 10vw;
    }

    .top-bar-img,.top-bar-img img{
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

    .mba img{
        object-fit: cover;
    }

    .mba h4{
        font-size: 1.5vw;
        font-weight: bold;
    }

    .mba-description{
        padding: 2vw;
        background-color: #1b6d85;
        color: white;
    }

    .mba-item{
        display: flex;
    }


    .mba-item-info,
    .mba-item-img {
        width: 30vw;
    }

    .mba-item-info{
        padding: 2vw;
    }
    .mba-item-img img{
        width: 100%;
        height: 100%;
    }


    ::-webkit-scrollbar {
        display: none;
    }

</style>
