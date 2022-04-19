<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 23/02/2020
 * Time: 14:46
 */
?>
<div>
    <div>您好 <?= $model->name ?>，</div>
    <div>
        您已经提交了<?php
            if ($model->type==1){
                echo "BBA";
            }else if ($model->type==2){
                echo "MBA";
            }else if ($model->type==3){
                echo "DBA";
            }
        ?>的在线注册申请。
        您的申请已经成功保存并会在最快的时间内处理。
    </div>
    <div>您会在申请审核通过之后收到一封确认邮件。</div>
    <div>祝您愉快</div>
</div>


<div>
    ******************************************
    IPLME
    118-120, RUE DE L'ABBE GROULT,
    75015 PARIS
    Tél: +33 (0)9 82 38 90 78
    Fax: +33 (0)9 82 41 29 83
    Mail: info@iplme.org
    Site: www.iplme.org
    *******************************************
</div>
