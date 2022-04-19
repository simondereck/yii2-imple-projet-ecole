<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 09/03/2020
 * Time: 18:56
 */
use yii\helpers\Html;
?>


<footer class="bottom-bar">
    <div class="footer-top">
        <div>
            <h3>> Coordonnées</h3>
            <div>
                <div>Addr : 118 -120 Rue de l'Abbé Groult 75015 Paris</div>
                <div>Tel (FLE) : +33 (0)1 45 30 02 29 </div>
                <div>Tel (Spécialité) : +33 (0)9 82 38 90 78 </div>
                <div>Email : info@iplme.org</div>
            </div>
        </div>
        <div>
            <h3>> Nous Suivre</h3>
            <div class="socail">
                <button href="https://www.facebook.com/IPLME-Business-School-105859714329027/?modal=admin_todo_tour" class="fa fa-facebook-square"></button>
                <button href="https://twitter.com/IPLME_paris" class="fa fa-twitter-square"></button>
                <button href="https://www.youtube.com/channel/UCSOwCJVTPF6ikCe42cLp68A?view_as=subscriber" class="fa fa-youtube-square"></button>
                <button href="https://www.linkedin.com/feed/?trk=onboarding-landing" class="fa fa-linkedin-square"></button>
            </div>
            <div class="qr-code">
                <div class="qr-code-item">
                    <img src="../../images/iplme/wechat.jpg" />
                    <div>Wechat</div>
                    <div>IPLME</div>
                </div>
                <div class="qr-code-item">
                    <img src="../../images/iplme/weibo.jpg" />
                    <div>Weibo</div>
                    <div>IPLME</div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-line">
        <div></div>
        <div class="footer-line-center">
            <div class="footer-bottom">
                <img src="../../images/iplme/logo.png"/>
            </div>
            <div class="footer-date">
                <p>&copy;  <?= date('Y')?>&nbsp;<?= Html::encode(Yii::$app->name) ?> - Tout doit réservé</p>
                <p><a href="https://lechengeois.com">Powered By B.R.O</a></p>
            </div>
        </div>
        <div>
        </div>
    </div>
</footer>
