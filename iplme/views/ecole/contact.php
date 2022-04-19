<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 24/11/2019
 * Time: 15:18
 */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use common\widgets\ArrayDatas;
?>
<!--<div class="contact-background">-->
<!--    <img src="../../images/iplme/contact.jpg" />-->
<!--</div>-->


<div class="contact">
    <div class="contact-form">
            <?php $form = ActiveForm::begin(['id' => 'form-createMessage']); ?>
                <?= $form->field($model,'name')->textInput()?>
                <?= $form->field($model,'firstname')->textInput() ?>
                <?= $form->field($model,'email')->textInput() ?>
                <div class="form-group">
                    <?= Html::button('Obtenez le code de vérification ',['class'=>'btn btn-warning get-code']) ?>
                </div>
                <?= $form->field($model,'code')->textInput() ?>
                <?= $form->field($model,'telephone')->textInput() ?>
                <?= $form->field($model,'pays')->dropDownList(
                        ArrayDatas::getPays()
                ) ?>
                <?= $form->field($model,'langue')->dropDownList(
                        ArrayDatas::getLangue()
                )?>
                <?= $form->field($model,'message')->textarea(['style'=>'height:10vw;']) ?>
                <div class="form-group">
                    <?= Html::submitButton('Envoyer',['class'=>'btn btn-success','style'=>'background-color:#31b0d5;']) ?>
                </div>
            <?php ActiveForm::end()?>
    </div>
</div>




<script>
    $('.get-code').on('click',function () {
        var email = $('#ipcontactmessage-email').val();
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
            // $.post( "test.php", { name: "John", time: "2pm" } );
            $.post('index.php?r=ecole/getcode',{'email':email},function (data) {
                if (data.message){
                    alert(data.message);
                }
            });
            return;
        }
        alert("Vous avez entré une adresse e-mail invalide！");
    });
</script>

<style>

    body{
        background-image: url("../../images/iplme/contact.jpg");
    }
    /*.contact-background{*/
        /*position: absolute;*/
        /*z-index: -50;*/
        /*background-color: transparent;*/
        /*width: 100%;*/
        /*height: 150%;*/
    /*}*/

    /*.contact-background,.contact-background img{*/
        /*width: 100%;*/
        /*height: 150%;*/
    /*}*/

    /*.contact-background img{*/
        /*object-fit: cover;*/
    /*}*/

    .contact{
        width: 100%;
        /*height:150%;*/
    }
    .contact-form{
        width: 45vw;
        margin: 0px auto 0px;
        padding: 2vw;
        /*overflow-y: scroll;*/
        /*-ms-overflow-style: none;*/
        /*height: 70vh;*/
    }

    .contact-form::-webkit-scrollbar {
        display: none;
    }

    .form-group{
        width:30vw;
        color:white;
    }

    .form-control{
        width: 40vw;
        /*background-color: transparent;*/
        /*color: white;*/
        margin: auto;
    }



    .form-group button{
        text-align: left;
    }
    .contact-form-button text{
        padding: 10px;
        color: white;
        background-color: #31b0d5;
        border-radius: 2px;
    }


    .contact-form-button text:hover{
        background-color: #203e5c;
        cursor:pointer;
    }

    ::placeholder {
        color: whitesmoke;
        opacity: 1;
        margin-left: 5px;
    }


    .bottom-bar{
        margin-top:5vh;
    }

</style>
