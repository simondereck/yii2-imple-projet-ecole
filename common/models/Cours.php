<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%cours}}".
 *
 * @property int $id
 * @property string $name
 * @property string $descript
 */
class Cours extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cours}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'descript'], 'required'],
            [['name', 'descript'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'descript' => 'Descript',
        ];
    }
}
