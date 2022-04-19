<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%ip_rdv}}".
 *
 * @property int $id
 * @property string $sdate
 * @property string $stime
 * @property string $edate
 * @property string $etime
 * @property int $professeur
 * @property int $student
 * @property int $vaild 0 invaild  1 vaild  2 fini 
 * @property string $title
 * @property string $location
 * @property string $description
 * @property string $ctime
 */
class IpRdv extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ip_rdv}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sdate', 'stime', 'edate', 'etime', 'professeur', 'student', 'vaild', 'title', 'location', 'description', 'ctime'], 'required'],
            [['sdate', 'edate', 'ctime'], 'safe'],
            [['professeur', 'student', 'vaild'], 'integer'],
            [['description'], 'string'],
            [['stime', 'etime'], 'string', 'max' => 45],
            [['title', 'location'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sdate' => 'Sdate',
            'stime' => 'Stime',
            'edate' => 'Edate',
            'etime' => 'Etime',
            'professeur' => 'Professeur',
            'student' => 'Student',
            'vaild' => 'Vaild',
            'title' => 'Title',
            'location' => 'Location',
            'description' => 'Description',
            'ctime' => 'Ctime',
        ];
    }
}
