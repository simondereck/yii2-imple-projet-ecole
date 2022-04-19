<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ip_vie_student".
 *
 * @property int $id
 * @property string $cover
 * @property string $title
 * @property string $text
 * @property int $status
 * @property string $utime
 * @property string $ctime
 */
class IpVieStudent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ip_vie_student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cover', 'title', 'text', 'status', 'utime', 'ctime'], 'required'],
            [['text'], 'string'],
            [['status'], 'integer'],
            [['utime', 'ctime'], 'safe'],
            [['cover', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cover' => 'Cover',
            'title' => 'Title',
            'text' => 'Text',
            'status' => 'Status',
            'utime' => 'Utime',
            'ctime' => 'Ctime',
        ];
    }
}
