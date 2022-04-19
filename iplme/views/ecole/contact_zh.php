<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 24/11/2019
 * Time: 15:18
 */
?>
<div class="contact-background">
    <img src="../../images/iplme/contact.jpg" />
</div>
<div class="contact">
    <div class="contact-form">
        <form id="email-form">
            <div>
                <input name="nom" placeholder="姓名"/>
            </div>
            <div>
                <input name="email" placeholder="邮箱"/>
            </div>
            <div>
                <textarea name="message" placeholder="留言"></textarea>
            </div>
            <div class="contact-form-button">
                <text>valider</text>
            </div>
        </form>
    </div>
</div>

<script>
    $('.contact-form-button').on('click','text',function () {
        $("#email-form").submit();
    });
</script>

<style>

    .contact-background{
        position: absolute;
        z-index: -50;
    }

    .contact-background,.contact-background img{
        width: 100%;
        height: 100%;
    }

    .contact-background img{
        object-fit: cover;
    }

    .contact-form{
        width: 60vw;
        margin: 0px auto 0px;
        padding: 2vw;
    }

    .contact-form div,input,textarea{
        width: 60vw;
        margin-top:10px;
        padding: 3px;
        background-color: transparent;
        color: white;
    }

    .contact-form input{
        border: none;
        border-bottom: 1px solid white;
    }

    textarea{
        height: 20vw;
        border: 1px solid white;
    }

    .contact-form-button{
        text-align: right;
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

</style>
