<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2020/6/27
 * Time: 下午10:52
 */
use common\widgets\ArrayDatas;
use yii\helpers\Html;
?>

<div class="inscription-div">
    <div class="inscription-title">Je voudrais m’inscrire au...</div>
    <div class="select-inscription-type">
        <select id="inscription-select" class="form-control">
           <?= Html::renderSelectOptions(null,ArrayDatas::getInscriptionType())?>
        </select>
    </div>
</div>
<script>
    $("#inscription-select").change(function () {
        let val = $(this).val();
        if(val!==""){
            window.location.href = "index.php?r=inscription/"+val;
        }
    });
</script>

<style>
    body{
        background: whitesmoke;
    }
    .inscription-div{
        background: white;
        padding:4vw;
        margin: 10vw auto 10vw;
        width:45vw;
        border-radius: 8px;
        box-shadow: 0 5px 5px rgba(0,0,0,0.3);
    }

    .inscription-title{
        font-size:2.4vw;
        text-align: center;
    }

    .select-inscription-type{
        margin-top: 3vw;
        margin-bottom: 4vw;
    }
</style>
