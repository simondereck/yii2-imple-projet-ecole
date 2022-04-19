<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ip_rdv_student".
 *
 * @property int $id
 * @property int $pid
 * @property int $sid
 * @property int $status
 * @property string $stime
 * @property string $description
 * @property string $ctime
 * @property int $rid
 */
class IpRdvStudent extends \yii\db\ActiveRecord
{
    public $steps = 1;
    public $selectDate;
    public $selectTime;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ip_rdv_student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'stime', 'sid','description','rid', 'ctime'], 'required'],
            [['id', 'pid','sid','status','rid'], 'integer'],
            [['stime', 'ctime'], 'safe'],
            [['description'], 'string'],
            [['id'], 'unique'],
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
            'sid'=>'Sid',
            'stime' => 'Stime',
            'status'=>'Status',
            'rid'=>'Rid',
            'description' => 'Description',
            'ctime' => 'Ctime',
        ];
    }
}
