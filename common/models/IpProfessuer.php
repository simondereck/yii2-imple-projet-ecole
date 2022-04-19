<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ip_professuer".
 *
 * @property int $id
 * @property string $path
 * @property string $description
 * @property string $name
 * @property int $status
 * @property string $utime
 * @property string $ctime
 */
class IpProfessuer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ip_professuer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['path', 'description', 'status', 'utime', 'ctime','name'], 'required'],
            [['description'], 'string'],
            [['status'], 'integer'],
            [['utime', 'ctime'], 'safe'],
            [['path','name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Path',
            'name'=>'Name',
            'description' => 'Description',
            'status' => 'Status',
            'utime' => 'Utime',
            'ctime' => 'Ctime',
        ];
    }
}
