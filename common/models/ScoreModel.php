<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 30/03/2020
 * Time: 09:44
 */

namespace common\models;


use yii\base\Model;

/**
 * Class ScoreModel
 * @package common\models
 * @property string $matiere
 */
class ScoreModel extends Model
{

    public $matiere;
    public $notes;
    public $ects;
    public $coefs;
    public $validee;
    public $points;
    public $ects1;


}
