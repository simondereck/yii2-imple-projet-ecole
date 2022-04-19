<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 30/03/2020
 * Time: 19:32
 */
use yii\helpers\Html;
use yii\helpers\Json;
use common\models\ScoreModel;
use common\widgets\ArrayDatas;
use common\widgets\PublicFunctionUnion;
$this->title = $document->firstname." 成绩详情";
?>

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-signup">
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>
    </div>
    <div class="float-right">
        <?php
            $cours = Json::decode($scores->cours);
            $tableNames = new ScoreModel();
            $cours["moyenne"]["coefs"] = 0;
            $cours["moyenne"]["ects"] = 0;

            foreach ($cours["items"] as $key => $item){
                if ($item["notes"] >= 10){
                    $cours["moyenne"]["coefs"] += $item["coefs"];
                    $cours["moyenne"]["ects"] += $item["ects"];
                }
            }
        ?>
        <table class="cours">
            <thead><tr>
                <?php foreach ($tableNames as $name => $va){ ?>
                    <th scope="col"><?= $name ?></th>
                <?php } ?>
            </tr></thead>
            <tbody>
            <?php foreach ($cours["items"] as $key => $item){ ?>
            <tr class="table-col">
                <?php foreach ($item as $value){ ?>
                    <td><?= $value ?></td>
                <?php } ?>
            </tr>
            <?php } ?>
            <tr class="table-col">
                <td>total</td>
                <td> </td>
                <td><?= $cours['total']['ects']?></td>
                <td><?= $cours['total']['coefs']?></td>
                <td></td>
                <td><?= $cours['total']['points']?></td>
                <td><?= $cours['total']['ects1']?></td>
            </tr>
            <tr class="table-col">
                <td>moyenne</td>
                <td><?= $cours['moyenne']['notes']?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><?= $cours['moyenne']['ects1']?></td>
            </tr>
            </tbody>
        </table>
        <div style="background-color: whitesmoke;padding: 2px;margin-top: 20px;margin-bottom: 20px;">
            <!--startprint-->
            <div style="padding: 20px;background-color: white;">
                <div class="sub-title" style="text-align: center;"><h3>RELEVE DE NOTES</h3></div>
                <div style="margin-top: 20px;">
                    <div style="display: flex;">
                        <div style="width: 20vw;"><label> Titulaire : <?= $document->firstname." ".$document->name ?></label></div>
                        <div style="width: 20vw;"><label>N° Etudiant : <?= $document->uid ?></label></div>
                    </div>
                    <div style="display: flex;">
                        <div style="width: 20vw;"><label>Né(e) le : <?= PublicFunctionUnion::setDateCreate($scores->utime) ?></label></div>
                        <div style="width: 20vw;"><label>Session : <?= ArrayDatas::getSession()[$document->session]?></label></div>
                    </div>
                    <div>
                        <label>
                            inscrit(e) en Cursus Spécialité <?= ArrayDatas::getFaculty()[$document->faculty] ?>.
                        </label>
                    </div>
                    <div>Semestre 1 et 2</div>
                    <div>a obtenu les résultats suivants</div>

                    <div style="margin-top: 20px;">
                        <table class="cours">
                            <thead>
                                <tr>
                                    <th scope="col"><?= "Matière" ?></th>
                                    <th scope="col"><?= "Notes" ?></th>
                                    <th scope="col"><?= "ECTS" ?></th>
                                    <th scope="col"><?= "Coefs" ?></th>
                                    <th scope="col"><?= "Validée" ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($cours["items"] as $key => $item){ ?>
                                <tr class="table-col">
                                    <td><?= $item['matiere'] ?></td>
                                    <td><?= $item['notes'] ?></td>
                                    <td><?= $item['ects'] ?></td>
                                    <td><?= $item['coefs'] ?></td>
                                    <td><?= $item['validee'] ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div style="margin-top: 5px;display: flex;font-weight: bold;">
                        <div>Moyenne Générale : <?= $cours['moyenne']['notes'] ?>/20 &nbsp;&nbsp;</div>
                        <div>Coefs: <?= $cours['moyenne']['coefs'] ?>/<?= $cours['total']['coefs'] ?> &nbsp;&nbsp;</div>
                        <div>ECTS  Obtenus : <?= $cours['moyenne']['ects'] ?>/<?= $cours['total']['ects'] ?> &nbsp;&nbsp;</div>
                    </div>

                    <div style="margin-top: 20px;display: inline-flex;font-weight: bold;padding: 10px;border: 1px black solid;">
                        <div>Moyenne Annuelle: <?= $cours['moyenne']['notes'] ?> &nbsp;&nbsp;</div>
                        <div>ECTS Obtenus: <?= $cours['moyenne']['ects'] ?></div>
                    </div>
                    <div style="margin-top: 20px;margin-bottom: 20px;">
                        <?php
                            $pass = false;
                            $passArray = [];
                            if ($cours['moyenne']['notes']<10){
                                $pass = true;
                            }else if ($cours['moyenne']['notes']>=10 && $cours['moyenne']['notes']<12){
                                $passArray[] = 0;
                                $passArray[] = 1;
                            }else if ($cours['moyenne']['notes']>=12 && $cours['moyenne']['notes']<14){
                                $passArray[] = 0;
                                $passArray[] = 2;
                            }else if ($cours['moyenne']['notes']>=14 && $cours['moyenne']['notes']<16) {
                                $passArray[] = 0;
                                $passArray[] = 3;
                            }else{
                                $passArray[] = 0;
                                $passArray[] = 4;
                            }
                        ?>
                        <div><?= Html::checkboxList('admise',$passArray,[
                                0=>'Admis(e)',
                                1=>'Passable',
                                2=>'Assez bien',
                                3=>'Bien',
                                4=>'Très bien',
                            ])  ?></div>
                        <div>
                            <?= Html::checkbox('Non admis(e)',$pass) ?>
                            <?= Html::label('Non admis(e)') ?>
                        </div>
                    </div>
                    <div>
                        Mention* : Passable : de 10 à 11,99/20 ; Assez Bien : de 12 à 13,99/20 ; Bien : de 14 à 15,99/20 ; Très bien : à partir de 16/20
                    </div>
                </div>
                <div style="text-align:right;font-size: 15px;font-weight: bold; ">
                    <div>Fait à Paris, le <?= PublicFunctionUnion::getDateFrString() ?></div>
                    <div>Le directeur</div>
                </div>
            </div>
            <style>
                .cours th,td{
                    width: 100px;
                    text-align: center;
                    padding: 10px;
                }

                .cours th{
                    background-color: #1b6d85;
                    color: white;
                }
                .cours td{
                    background-color: whitesmoke;
                }
                .table-col td:first-child {
                    background-color: #00a2d4;
                    color: white;
                }


            </style>
            <!--endprint-->
            <div style="margin-top: 20px;text-align: right;">
                <?= Html::button('打印',['class'=>'btn btn-success print'])?>
            </div>
        </div>
    </div>

</main>

<script>
    function doPrint() {
        bdhtml = window.document.body.innerHTML;
        sprnstr = "<!--startprint-->";
        eprnstr = "<!--endprint-->";
        prnhtml = bdhtml.substr(bdhtml.indexOf(sprnstr)+17);
        prnhtml = prnhtml.substring(0,prnhtml.indexOf(eprnstr));
        // window.document.body.innerHTML = prnhtml;
        myWindow = window.open('','','width=1200,height=1000');
        myWindow.document.body.innerHTML = prnhtml;
        myWindow.focus();
        myWindow.print();
    }

    $(".print").on('click',function () {
        doPrint();
    });
</script>

<style>
    .cours th,td{
        width: 100px;
        text-align: center;
        padding: 10px;
    }

    .cours th{
        background-color: #1b6d85;
        color: white;
    }
    .cours td{
        background-color: whitesmoke;
    }
    .table-col td:first-child {
        background-color: #00a2d4;
        color: white;
    }


</style>
