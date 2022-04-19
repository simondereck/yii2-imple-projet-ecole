<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\ButtonGroup;
use yii\bootstrap\Button;
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">
    <div class="top-bar-img">
<!--        <img src="../../images/admin/logo_admin.png" />-->
        IPLME
    </div>
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'rememberMe')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Login', ['class' => 'btn btn-info',
            'name' => 'login-button',
            'style'=>'width:100%;border:none;padding:1vw;',
        ]) ?>
    </div>
    <?php ActiveForm::end(); ?>
    <div class="login-bottom">
        <div class="line"></div>
        <div class="text">Nouveau Chez IPLME</div>
        <div class="line"></div>
    </div>
    <div class="from-group">
        <?= Html::button("S'inscrire",['class'=>'btn btn-info inscription'])?>
    </div>

    <div class="inscription-item-text">
        <a data-href="../../images/pdf/DBA.pdf">Pièces à joindre à la fiche d'inscription:<img src="../../images/iplme/download.jpg" /></a>
        <p>
            <li>CV et lettre de motivation.</li>
            <li>
                Photocopie de votre visa/passeport/carte de séjour
            </li>
            <li>
                Photocopie de votre dernier certificat d'assiduité/relevés de notes
            </li>
            <li>
                diplôme ou attestation de réussite
            </li>
            <li>2 photo</li>

        </p>
    </div>
</div>

<script>

</script>
<style>
    .site-login{
        background-color: white;
        width: 35vw;
        padding: 2vw;
        margin: 2vh auto 2vh;
        box-shadow: 2px 2px 2px 1px rgba(0,0,0,0.2);
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }

    .top-bar-img , .top-bar-img img{
        width:23vw;
        height: 8vw;
        text-align: center;
        font-size: 4.5vw;
    }

    .top-bar-img{
        margin: 10px auto 10px;
    }

    img{
        object-fit: cover;
    }

    @media (max-width: 767px) {
        .site-login {
            width: 86vw;
            margin: 2vw auto 2vw;
        }
    }

    .btn-group button{
        margin: 2px;
    }

    .login-bottom{
        margin-top: 2vw;
        display: flex;
        color: lightgray;
        justify-content: space-around;
        align-items: center;
    }


    .login-bottom .line{
        width: 20%;
        height: 1px;
        background-color: gray;
    }

    .inscription{
        width: 100%;
        background: white;
        color: deepskyblue;
        margin-top: 2vw;
        /*border: none;*/
        margin-bottom: 2vw;
    }

    .inscription-item-text{
        margin-top: 2vw;
    }

    .inscription-item a{
        display: block;
        margin-bottom: 2vw;
    }
    .inscription-item a:hover{
        cursor: pointer;
        text-decoration: none;
    }

    .inscription-item-text a:hover{
        cursor: pointer;
        text-decoration: none;
    }


    .inscription-item-text img{
        width: 2vw;
        height: 2vw;
        margin-left: 2vw;
    }

    .bottom-bar{
        margin-top:5vw;
    }
</style>


<script>
    $(function () {
        // $('.btn-group').hide();

        document.onreadystatechange = function () {
            if (document.readyState === "complete") {
//                $('.btn-group').hide();
//                $('.inscription-item-text').hide();
            }
        }
    });
    $(".inscription").on('click',function () {
        window.location.href = "../../iplme/web/index.php?r=inscription/inscription";
//        $('.btn-group').toggle('slow');
//        $('.inscription-item-text').toggle('slow');
    });

    $('.inscription-item-text').on('click','a',function () {
        let val = $(this).attr('data-href');
        window.open(val);
    });
    $('.btn-group').on('click','button',function () {
       let id = $(this).attr('data-id');
       let href = "../../iplme/web/index.php?r=inscription/"+id;
       window.location.href = href;

    });
</script>
