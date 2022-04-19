<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 28/05/2019
 * Time: 16:16
 */

namespace common\models;


use yii\base\Model;

/**
 * Class OrderSearchParamsModel
 * @package common\models
 *
 * @property string $fdate;
 * @property string $ldate;
 * @property int $status;
 * @property string $ctime;
 * @property int $type;
 * @property int $model;
 *
 */

class OrderSearchParamsModel extends Model
{

    public $fdate;
    public $ldate;
    public $status;
    public $ctime;
    public $model;

    public function rules()
    {
        return [
            [['type', 'model','status'], 'integer'],
            [['fdate',"ldate",'ctime'], 'trim'],
            [['ctime','ldate','bdate'], 'safe'],
        ];
    }



    public function attributeLabels()
    {
        return [
            'fdate'=>'开始日期',
            'ldate'=>'结束日期',
            'type'=>'Type',
            'model'=>'类型',
            'status'=>'状态',
            'ctime'=>'创建时间',
        ];
    }
}