<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 02/02/2019
 * Time: 18:08
 */
namespace common\exceptions;

use yii\base\Exception;

class MongoQueryExceptions extends Exception
{
    public function getName()
    {
        return "MongoQueryExceptions";
    }


}