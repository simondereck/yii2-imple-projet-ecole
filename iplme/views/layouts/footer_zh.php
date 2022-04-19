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
            <h3>> 联络方式</h3>
            <div>
                <label>地址 : </label>
                <div>118 -120 Rue de l'Abbé Groult 75015 Paris </div>
                <label>电话 : </label>
                <div>+33 (0)1 45 30 02 29</div>
                <div>+33 (0)9 82 38 90 78</div>
                <label>QQ : </label>
                <div>2096653155</div>
                <label>邮箱 : </label>
                <div>info@iplme.org</div>
            </div>
        </div>
        <div>
            <h3>> 关注我们</h3>
            <div class="socail">
                <button href="https://www.facebook.com/iplm.pairs" class="fa fa-facebook-square"></button>
                <button href="https://twitter.com/IPLME_paris" class="fa fa-twitter-square"></button>
                <button href="https://www.youtube.com/channel/UCSOwCJVTPF6ikCe42cLp68A?view_as=subscriber" class="fa fa-youtube-square"></button>
                <button href="https://www.linkedin.com/feed/?trk=onboarding-landing" class="fa fa-linkedin-square"></button>
            </div>
            <div class="qr-code">
                <div class="qr-code-item">
                    <img src="../../images/iplme/wechat.jpg" />
                    <div>官方微信</div>
                    <div>法国亿搏高商</div>
                </div>
                <div class="qr-code-item">
                    <img src="../../images/iplme/weibo.jpg" />
                    <div>官方微博</div>
                    <div>法国亿搏高商</div>
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
                <p>&copy;  <?= date('Y')?>&nbsp;<?= Html::encode(Yii::$app->name) ?> - 版权所有 © 亿搏高等商学院IPLME</p>
            </div>
        </div>
        <div>
        </div>
    </div>
</footer>

