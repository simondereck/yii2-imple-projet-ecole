<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 10/06/2019
 * Time: 17:42
 */

namespace iplme\models;
use common\models\Admin;
use Yii;


class AdminAccessControl
{

    static function getIsSuperAdmin(){
        return Yii::$app->user->identity["permission"] == Admin::ADMIN_SUPER;
    }


}