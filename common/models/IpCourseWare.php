<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ip_course_ware".
 *
 * @property int $id
 * @property int $cours
 * @property string $image
 * @property array $year
 * @property array $faculty
 * @property array $session
 * @property string $description
 * @property string $ctime
 * @property string $utime
 */
class IpCourseWare extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ip_course_ware';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cours', 'image', 'year', 'faculty', 'session', 'description', 'ctime', 'utime'], 'required'],
            [['cours'], 'integer'],
            [['year', 'faculty', 'session', 'ctime', 'utime'], 'safe'],
            [['description'], 'string'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cours' => 'Cours',
            'image' => 'Image',
            'year' => 'Year',
            'faculty' => 'Faculty',
            'session' => 'Session',
            'description' => 'Description',
            'ctime' => 'Ctime',
            'utime' => 'Utime',
        ];
    }
}
