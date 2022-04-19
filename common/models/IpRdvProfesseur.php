<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ip_rdv_professeur".
 *
 * @property int $id
 * @property int $pid
 * @property array $sdate
 * @property array $stime
 * @property array $dateArea
 * @property int $interval
 * @property string $utime
 * @property string $ctime
 */
class IpRdvProfesseur extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ip_rdv_professeur';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'sdate', 'stime', 'dateArea', 'interval', 'utime', 'ctime'], 'required'],
            [['pid', 'interval'], 'integer'],
            [['sdate', 'stime', 'dateArea', 'utime', 'ctime'], 'safe'],
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
            'sdate' => 'Sdate',
            'stime' => 'Stime',
            'dateArea' => 'Date Area',
            'interval' => 'Interval',
            'utime' => 'Utime',
            'ctime' => 'Ctime',
        ];
    }
}
