<?php

namespace common\models;

use phpDocumentor\Reflection\Types\String_;
use Yii;

/**
 * This is the model class for table "ip_course_ware_detail_1".
 *
 * @property int $id
 * @property int $wid
 * @property string $data_url
 * @property string $name
 * @property string $ctime
 * @property string $utime
 */
class IpCourseWareDetail extends \yii\db\ActiveRecord
{

    private static $prix;

    public static function setPrix($id){
        self::$prix = $id%7;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ip_course_ware_detail_'.self::$prix;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['wid', 'data_url', 'ctime', 'utime','name'], 'required'],
            [['wid'], 'integer'],
            [['ctime', 'utime'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [["data_url"], "file",],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'wid' => 'Wid',
            'name'=>'Name',
            'data_url' => 'Data Url',
            'ctime' => 'Ctime',
            'utime' => 'Utime',
        ];
    }
}
