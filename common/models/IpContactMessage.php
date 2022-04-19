<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ip_contact_message".
 *
 * @property int $id
 * @property string $name
 * @property string $firstname
 * @property string $email
 * @property string $telephone
 * @property int $pays
 * @property int $langue
 * @property string $message
 * @property string $code
 * @property int $status
 * @property string $ctime
 */
class IpContactMessage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ip_contact_message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'firstname', 'email', 'telephone', 'pays', 'langue', 'message', 'code', 'status', 'ctime'], 'required'],
            [['pays', 'langue', 'status'], 'integer'],
            [['message'], 'string'],
            [['name', 'firstname', 'email', 'telephone'], 'string', 'max' => 255],
            [['code', 'ctime'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nom',
            'firstname' => 'Prénom',
            'email' => 'Email',
            'telephone' => 'Numéro de téléphone',
            'pays' => 'Pays',
            'langue' => 'Langue',
            'message' => 'Message',
            'code' => 'Code',
            'status' => 'Status',
            'ctime' => 'Ctime',
        ];
    }
}
