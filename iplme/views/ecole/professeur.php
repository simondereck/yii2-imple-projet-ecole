<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 24/11/2019
 * Time: 15:18
 */

?>
<div class="professeur-detail">
    <div class="top-bar-img">
        <img src="../../images/iplme/ecole_professeur.jpg" />
        <div>Professeur</div>
    </div>
    <div class="professeur-items">
        <?php if ($datas){
            foreach ($datas as $key=>$data) {
                if ($key%2==0){
                    ?>
                    <div class="professeur-item">
                        <div class="professeur-item-img">
                            <img src="<?php echo $data->path;?>" />
                        </div>
                        <div class="professeur-item-info">
                            <div class="cell color-white">
                                <h4 class="section-title text-"><?php echo $data->name;?></h4>
                                <p>
                                    <?php echo $data->description;?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                }else{
                    ?>
                    <div class="professeur-item">
                        <div class="professeur-item-info">
                            <div class="cell color-white">
                                <h4 class="section-title text-"><?php echo $data->name;?></h4>
                                <p>
                                    <?php echo $data->description;?>
                                </p>
                            </div>
                        </div>
                        <div class="professeur-item-img">
                            <img src="<?php echo $data->path;?>" />
                        </div>
                    </div>
                    <?php
                }

            }
        }else{ ?>
            <div class="professeur-item">
                <div class="professeur-item-img">
                    <img src="http://www.audencia.com.cn/app/uploads/about_our_faculty_01.jpg" />
                </div>
                <div class="professeur-item-info">
                    <div class="cell color-white">
                        <h4 class="section-title text-">Fran??ois Debernard</h4>
                        <p>Dipl??m?? en droit et sciences politiques,riche de dix ann??es pass??es dans l???enseignement sup??rieur, je me consacre d??sormais pleinement au d??veloppement et ?? la gestion de l???IPLME pour que nos ??tudiants puissent parvenir ?? r??aliser leurs objectifs universitaires et professionnels.<br>
                            Le groupe IPLME, c???est aujourd???hui une multitude de fili??res, vari??es et compl??mentaires, sp??cialis??es dans les sciences de gestion, humaines,artistiques et culturelles.
                        </p>
                    </div>
                </div>
            </div>
            <div class="professeur-item">
                <div class="professeur-item-info">
                    <div class="cell color-white">
                        <h4 class="section-title text-">Simon PRONO</h4>
                        <p>Dipl??m?? d???un master de didactique et p??dagogie du Fran??ais Langue Etrang??re et fort d???une exp??rience vari??e aupr??s de divers publics d???apprenants en France et ?? l?????tranger, j???enseigne le fran??ais ?? l???IPLME depuis 2012.  En tant que  responsable p??dagogique des cours de fran??ais, j???organise  ??galement  le programme des cours ainsi que l???orientation et le suivi des apprenants. De plus, ??tant sensible au monde des arts et de la culture,  j???ai pu organiser des ateliers th????tre ou musique ayant abouti ?? des   spectacles. Aussi ai-je ?? c??ur de transmettre aux ??tudiants des r??f??rences culturelles aussi bien que des rep??res du quotidien en vue d???une meilleure   immersion dans un environnement francophone</p>
                    </div>
                </div>
                <div class="professeur-item-img">
                    <img src="http://www.audencia.com.cn/app/uploads/about_our_faculty_02.jpg" />
                </div>
            </div>

            <div class="professeur-item">
                <div class="professeur-item-img">
                    <img src="http://www.audencia.com.cn/app/uploads/about_our_faculty_01.jpg" />
                </div>
                <div class="professeur-item-info">
                    <div class="cell color-white">
                        <h4 class="section-title text-">Yan Bartel</h4>
                        <p>Issu d'une formation pluridisciplinaire en ??conomie, math??matiques appliqu??es  et sciences politiques, j'ai dispens?? des cours dans diff??rents ??tablissements de l'enseignement sup??rieur (??coles de commerce, ing??nieurs, universit??), mais ??galement en lyc??e (SES et Pr??paration aux concours d'entr??e en IEP). J'enseigne la th??orie des jeux et la logique math??matique, l'??conom??trie et les m??thodes statistiques, la finance de march??, les m??thodes d'optimisation, la logistique, et l'informatique th??orique</p>
                    </div>
                </div>
            </div>

            <div class="professeur-item">

                <div class="professeur-item-info">
                    <div class="cell color-white">
                        <h4 class="section-title text-">St??phanie Perrot</h4>
                        <p>Apr??s  avoir travaill?? 15 ans dans des maisons de couture ?? des postes d???encadrement en stylisme, d??veloppement de produits et marketing,
                            j???interviens en tant que consultante dans le luxe, notamment dans 3 principaux domaines :
                        </p>
                        <ul>
                            <li>la mode</li>
                            <li>le bien-??tre</li>
                            <li>le savoir-vivre</li>
                        </ul>
                        Mon objectif aujourd'hui est de transmettre mes connaissances et mes comp??tences afin de former la rel??ve de demain.
                        <p></p>
                    </div>
                </div>
                <div class="professeur-item-img">
                    <img src="http://www.audencia.com.cn/app/uploads/about_our_faculty_02.jpg" />
                </div>
            </div>

            <div class="professeur-item">
                <div class="professeur-item-img">
                    <img src="http://www.audencia.com.cn/app/uploads/about_our_faculty_01.jpg" />
                </div>
                <div class="professeur-item-info">
                    <div class="cell color-white">
                        <h4 class="section-title text-">Julien Letailleur</h4>
                        <p>Apr??s 10 ans d'exp??rience dans le conseil B to B en intelligence ??conomique, en strat??gie et en marketing strat??gique, j'ai d??cid?? de cr??er ma propre entreprise. Depuis 2016, je dirige Sewote, une startup sp??cialis??e en analyse s??mantique et en traitement automatique des textes. Il s'agit de ma principale activit??. Par ailleurs, depuis 2014 j'enseigne la vie de l'entreprise et l'intelligence ??conomique, respectivement, ?? l'universit?? Paris XIII et ?? l'ESMA. J'ai int??gr?? l'??quipe p??dagogique de l'IPLME en 2016, et je suis responsable du cours de th??ories ??conomiques et d???Histoire de la pens??e ??conomique. </p>
                    </div>
                </div>
            </div>


            <div class="professeur-item">
                <div class="professeur-item-info">
                    <div class="cell color-white">
                        <h4 class="section-title text-">G??rardo Bricout</h4>
                        <p>Depuis longtemps, j'exerce en tant que gestionnaire et manager de projets culturels. Egalement enseignant en m??diation culturelle, en arts et m??dias, notamment sp??cialiste de la morphologie et de l'??conomie du champ culturel, du financement de la culture, du tourisme culturel, de l'histoire de l'art occidentale. Je participe et aide ?? l'??laboration de projets culturels. De m??me, je forme aux m??tiers de la m??diation culturelle, et j'exerce en tant que guide accompagnateur reconnu dans le tourisme culturel. Je suis aussi artiste pluridisciplinaire (dessin, peinture, photographie, vid??o, performance. </p>
                    </div>
                </div>
                <div class="professeur-item-img">
                    <img src="http://www.audencia.com.cn/app/uploads/about_our_faculty_02.jpg" />
                </div>
            </div>


            <div class="professeur-item">
                <div class="professeur-item-img">
                    <img src="http://www.audencia.com.cn/app/uploads/about_our_faculty_01.jpg" />
                </div>
                <div class="professeur-item-info">
                    <div class="cell color-white">
                        <h4 class="section-title text-">Chadia Semdani</h4>
                        <p>?? Dipl??m??e de la facult?? de droit de Paris et de l???institut d?????tudes   judiciaires, j???ai une formation et une exp??rience d???avocate de plus de 20 ans. J???ai ??galement une exp??rience dans l???enseignement universitaire mais aussi au sein d?????tablissements priv??s. J???enseigne le droit ?? l???IPLME depuis 2011. Je dispense ??galement des cours de droit dans des centres de formation des apprentis (CFA) ainsi que dans des ??tablissement pr??parant aux BTS. Je suis aussi tr??s impliqu??e dans les questions??ducatives, pr??sidente d???un conseil de la FCPE et organisatrice d???un forum des m??tiers.
                        </p>
                    </div>
                </div>
            </div>

        <?php }?>
    </div>
</div>


<style>
    body{
        background-color: whitesmoke;
    }

    .professeur-detail{
        width: 60vw;
        margin: 15px auto 15px;
        background-color: white;
    }

    .top-bar-img,.top-bar-img img {
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


    .professeur-item-img,.professeur-item-img img{
        width: 29vw;
        max-height: 50vw;
        min-height: 20vw;
        object-fit: cover;
    }

    .professeur-item{
        display: flex;
        margin: 1vw;
        background-color: whitesmoke;
    }

    .professeur-item-info{
        font-size: 1vw;
        padding: 20px;
        width: 29vw;
    }

    h4{
        font-size: 1.5vw;
        font-weight: bold;
    }
    img{
        object-fit: cover;
    }


</style>
