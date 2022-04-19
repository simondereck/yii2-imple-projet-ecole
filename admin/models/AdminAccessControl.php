<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 10/06/2019
 * Time: 17:42
 */

namespace admin\models;
use common\models\Admin;
use common\models\Demander;
use common\widgets\PublicFunctionUnion;
use Yii;


class AdminAccessControl
{

    static function getIsSuperAdmin(){

        if (Yii::$app->user->identity&&Yii::$app->user->identity['types'] == Admin::USER_ADMIN){
            return Yii::$app->user->identity["permission"] == Admin::ADMIN_SUPER;
        }else{
            return false;
        }
    }

    static function getIsAdmin(){
        if (Yii::$app->user->identity&&Yii::$app->user->identity['types'] == Admin::USER_ADMIN){
            return true;
        }else{
            return false;
        }
    }

    static function getIsProfesseur(){
        if (Yii::$app->user->identity){
            return Yii::$app->user->identity['types'] == Admin::USER_PROFESSEUR;
        }else{
            return false;
        }
    }


    static function getIsStudent(){
        if (Yii::$app->user->identity) {
            return Yii::$app->user->identity['types'] >= Admin::USER_STUDENT;
        }else{
            return false;
        }
    }

    static function getIsDba(){

        $demander = Demander::findOne(['uid'=>Yii::$app->user->getId()]);
        if ($demander){
            return Demander::findOne(['uid'=>Yii::$app->user->getId()])->year>5;
        }
        return false;
    }
}
