<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ip_demander_fle".
 *
 * @property int $id
 * @property int $uid
 * @property string $name
 * @property string $firstname
 * @property int $gender
 * @property string $birthday
 * @property string $payer
 * @property string $sociale
 * @property int $profession
 * @property string $rue
 * @property string $code
 * @property string $city
 * @property string $telephone
 * @property string $email
 * @property int $level
 * @property int $status
 * @property string $ctime
 */
class IpDemanderFle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ip_demander_fle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'firstname', 'gender', 'birthday', 'payer', 'profession', 'rue', 'code', 'city', 'telephone', 'email', 'level', 'status', 'ctime'], 'required'],
            [['uid', 'gender', 'profession', 'level', 'status'], 'integer'],
            [['birthday', 'ctime'], 'safe'],
            [['name', 'firstname', 'payer', 'sociale', 'rue', 'code', 'city', 'telephone', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'name' => 'Name',
            'firstname' => 'Firstname',
            'gender' => 'Civilité',
            'birthday' => 'Birthday',
            'payer' => 'Payer',
            'sociale' => 'Sociale',
            'profession' => 'Profession',
            'rue' => 'Rue',
            'code' => 'Code',
            'city' => 'City',
            'telephone' => 'Telephone',
            'email' => 'Email',
            'level' => 'Level',
            'status' => 'Status',
            'ctime' => 'Ctime',
        ];
    }
}
