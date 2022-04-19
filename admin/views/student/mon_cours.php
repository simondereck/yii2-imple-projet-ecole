<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 12/01/2020
 * Time: 20:10
 */
use yii\widgets\ActiveForm;
use common\widgets\ArrayDatas;
use yii\widgets\DetailView;
?>

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <div class="site-title">
        <?php
            if ($cours->status===0){
                echo "<h3 class='wait'>Tous les cours restent à être confirmés</h3>";
            }else if ($cours->status===1){
                echo "<h3 class='valid'>Mon cours</h3>";
            }else if ($cours->status===2){
                echo "<h3 class='invalid'>Vos cours choisis n’arrivent pas à être validés, veuillez nous contacter par courriel.</h3>";
            }
        ?>
        <hr>
    </div>
    <div class="float-right">
        <?=
        DetailView::widget([
            'model' => $cours,
            'attributes' => [
                [
                    'attribute'=>'year',
                    'value'=>function($model){
                        return ArrayDatas::getCoursProgramYear()[$model->year];
                    }
                ],
                [
                    'attribute'=>'session',
                    'value'=>function($model){
                        return ArrayDatas::getSession()[$model->session];
                    }
                ],
                [
                    'attribute'=>'faculty',
                    'value'=>function($model){
                        return ArrayDatas::getFaculty()[$model->faculty];
                    }
                ],
                [
                    'attribute'=>'cours',
                    'format'=>'html',
                    'value'=>function($model){
                        $cours = json_decode($model->cours,true);
                        $courStr = "Cours obligatoires:<br>" ;
                        foreach ($cours["ness"] as $key=>$value){
                            if (is_array($value)){
                                $courStr .=  $value["id"]." -- ".$key." : ".$value["score"]." <br>";
                            }else{
                                $courStr .=  $key." : ".$value." <br>";
                            }
                        }
                        $courStr .= "Cours facultatifs: <br>";
                        foreach ($cours["opt"] as $key=>$value){
                            if (is_array($value)){
                                $courStr .= $value["id"]." -- ".$key. " : ".$value["score"]." <br>";
                            }else{
                                $courStr .= $key." : ".$value ." <br>";
                            }
                        }
                        return $courStr;
                    }
                ],

                'ctime',
            ],
        ]);
        ?>
    </div>
</main>


<style>
    main{
        padding: 2vw;
    }

    main h4{
        font-size: 1.5vw;
        font-weight: normal;
    }

    .wait{
        color: #1b6d85;
    }
    .invaild{
        color: darkred;
    }

    .valid{
        color: greenyellow;
    }

</style>
