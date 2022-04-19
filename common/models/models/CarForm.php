<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 07/02/2019
 * Time: 17:43
 */

namespace common\models\models;


use common\models\Car;

/**
 * This is the model class for table "{{%car}}".
 *
 * @property int $id
 * @property string $name
 * @property string $info
 * @property string $pic
 * @property int $price
 * @property string $ctime
 * @property int $status
 */

class CarForm extends Car
{



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['price','status'], 'integer'],
            [['name', 'info','pic'], 'string', 'max' => 255],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'info' => '信息',
            'price' => '价格',
            'status'=>'状态',
            'pic'=>'图片',
            'ctime' => 'Ctime',
        ];
    }





}