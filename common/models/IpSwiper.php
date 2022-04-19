<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ip_swiper".
 *
 * @property int $id
 * @property string $path
 * @property string $ctime
 */
class IpSwiper extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ip_swiper';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['path', 'ctime'], 'required'],
            [['ctime'], 'safe'],
            [['path'], 'string', 'max' => 255],
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
            'ctime' => 'Ctime',
        ];
    }
}
