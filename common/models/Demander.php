<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%ip_demander}}".
 *
 * @property int $id
 * @property int $gender 0 madame 1 mademoiselle 2 monsieur
 * @property string $name
 * @property string $firstname
 * @property string $birthday
 * @property string $payer
 * @property string $sociale
 * @property int $profession
 * @property string $rue
 * @property string $code
 * @property string $city
 * @property string $telephone
 * @property string $email
 * @property int $session
 * @property int $year
 * @property int $faculty
 * @property int $type
 * @property int $status 0 wait 1 success 2 block
 * @property string $ctime
 * @property int $uid;
 */
class Demander extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ip_demander}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gender', 'name', 'firstname', 'birthday', 'payer', 'profession', 'rue', 'code', 'city', 'telephone', 'email', 'session', 'year', 'faculty', 'type', 'status', 'ctime'], 'required'],
            [['birthday', 'ctime'], 'safe'],
            [['profession', 'session', 'year', 'faculty', 'type','status','uid','gender'], 'integer'],
            [['rue'], 'string'],
            [['name', 'firstname', 'payer', 'sociale', 'code', 'city', 'telephone', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gender' => 'Civilité',
            'name' => 'Prénom',
            'firstname' => 'Nom',
            'birthday' => 'Date de naissance',
            'payer' => 'Pays',
            'sociale' => 'Sociale',
            'profession' => 'Profession',
            'rue' => 'Rue',
            'code' => 'Code postal',
            'city' => 'Ville',
            'telephone' => 'Téléphone',
            'email' => 'Email',
            'session' => 'Session',
            'year' => 'Année',
            'faculty' => 'Spécialité que vous voulez vous inscrire',
            'type' => 'Type',
            'status' => 'Status',
            'uid'=>'Uid',
            'ctime' => 'Ctime',
        ];
    }
}
