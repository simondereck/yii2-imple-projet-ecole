<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 03/12/2019
 * Time: 20:23
 */
?>

<div class="bba">
    <div class="top-bar-img">
        <img src="../../images/programe/header_page.jpg"/>
        <div>BAC+1-3</div>
    </div>
    <div class="bba-description">
        <h4>BBA （Bachelor of Business Administration）</h4>
        <p>
            L’IPLME adhère au principe d’enseignement de « la combinaison des connaissance théoriques
            et la pratique», et fournit des talents aux milieux industriels et commerciaux depuis beaucoup
            d’années. Notre programmes comprennent principalement: «la gestion de luxe»,
            «le tourisme et la gestion hôtelière», «la logistique et le transport», l«e marketing»,
            «le commerce et le commerce international», «la gestion d’entreprise et les finances».
        </p>
    </div>
    <div class="bba-item">
        <div class="bba-item-info">
            <p>
                L’objectif des cours du premier cycle est d’aider les étudiants à comprendre généralement
                les connaissances des affaires et les bases sur l’entreprise. Afin d’y parvenir, les étudiants
                doivent non seulement maîtriser les connaissances dans leurs domaines spécifiques,
                mais aussi avoir une perception des autres domaines relatifs et les mettre en pratique à travers
                la simulation de cas réel, dans ce cas, les étudiants se permettent mieux organiser et planifier
                leurs projets professionnels.

            </p>
            <p>
                Le niveau d’enseignement de la maîtrise vise à aider les étudiants qui connaissent déjà les bases
                de l’entreprise à mener les recherches approfondies dans un domaine spécifique.
                En outre, étant donné que les étudiants en master sont susceptibles d’entrer dans le marché du travail,
                un stage est donc exigé à la fin du deuxième et du quatrième semestre.


            </p>
            <h4>
                Matières principales：
            </h4>
            <ul>
                <li>
                    Logistique internationale
                </li>
                <li>
                    Marketing d’entreprise
                </li>
                <li>
                    Management du luxe et tourisme culturel
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
        <div class="bba-item-img">
            <img src="../../images/programe/bda1.jpg" />
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

    /*.nav-bba span {*/
        /*display: inline-block;*/
        /*padding: 1vw;*/
        /*font-size: 1.25vw;*/
        /*list-style: none;*/
        /*position: relative;*/
        /*text-align: center;*/
    /*}*/

    .nav-bba span:hover{
        background-color: rgba(0,0,0,0.3);
        cursor: pointer;
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

    .bba{
        background-color: white;
        width: 60vw;
        font-size: 1vw;
        margin: 20px auto 10vw;

    }

    .bba h4{
        font-size: 1.5vw;
        font-weight: bold;
    }

    .bba-description{
        padding: 2vw;
        background-color: #1b6d85;
        color: white;
    }

    .bba-item{
        display: flex;
    }

    .bba-item-info,.bba-item-img,.bba-item-img img{
        width: 30vw;
    }

    .bba-item-info{
        padding: 2vw;
    }

    .bba-item-img img{
        height: 100%;
    }

    img{
        object-fit: cover;
    }


    ::-webkit-scrollbar {
        display: none;
    }


</style>

