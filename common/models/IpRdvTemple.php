<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ip_rdv_temple_0".
 *
 * @property int $id
 * @property int $pid
 * @property string $rdate
 * @property string $rtime
 * @property int $week
 * @property int $status
 * @property string $ctime
 */
class IpRdvTemple extends \yii\db\ActiveRecord
{

    static $prix = 0;

    public static function setPrix($pid){
        IpRdvTemple::$prix = $pid%5;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ip_rdv_temple_'.IpRdvTemple::$prix;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'rdate', 'rtime', 'week', 'status', 'ctime'], 'required'],
            [['pid', 'week', 'status'], 'integer'],
            [['rdate', 'ctime'], 'safe'],
            [['rtime'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => 'Pid',
            'rdate' => 'Rdate',
            'rtime' => 'Rtime',
            'week' => 'Week',
            'status' => 'Status',
            'ctime' => 'Ctime',
        ];
    }
}
