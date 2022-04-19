<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%cours_program}}".
 *
 * @property int $id
 * @property string $year
 * @property string $faculty
 * @property string $ctime
 * @property array $ness
 * @property array $opt
 * @property string $session
 */
class CoursProgram extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cours_program}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year', 'faculty', 'ctime', 'ness', 'session'], 'required'],
            [['ctime'], 'safe'],
            [['year', 'faculty', 'session'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'year' => 'Year',
            'faculty' => 'Faculty',
            'ctime' => 'Ctime',
            'ness' => 'Ness',
            'opt' => 'Opt',
            'session' => 'Session',
        ];
    }
}
