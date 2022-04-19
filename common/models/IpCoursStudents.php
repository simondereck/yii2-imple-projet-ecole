<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%ip_cours_students}}".
 *
 * @property int $id
 * @property int $sid
 * @property int $year
 * @property int $session
 * @property int $faculty
 * @property array $cours
 * @property string $ctime
 * @property int $status
 */
class IpCoursStudents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ip_cours_students}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sid', 'year', 'session', 'faculty', 'cours', 'ctime','status'], 'required'],
            [['sid', 'year', 'session', 'faculty','status'], 'integer'],
            [['cours'], 'string'],
            [['ctime'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sid' => 'Sid',
            'year' => 'Year',
            'session' => 'Session',
            'faculty' => 'Faculty',
            'cours' => 'Cours',
            'status'=>'Status',
            'ctime' => 'Ctime',
        ];
    }
}
