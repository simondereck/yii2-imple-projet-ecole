<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property string $headimage
 * @property string $telephone
 * @property string $province
 * @property string $country
 * @property int $gender
 * @property string $uid
 * @property string $wechat
 * @property string $ctime
 * @property string $utime
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{


    const STATUS_DELETE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_VERIFY = 2; //等待微信认证
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'ctime'], 'required'],
            [['status', 'gender'], 'integer'],
            [['ctime', 'utime'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'headimage', 'telephone', 'uid', 'wechat'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['province', 'country'], 'string', 'max' => 45],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'headimage' => 'Headimage',
            'telephone' => 'Telephone',
            'province' => 'Province',
            'country' => 'Country',
            'gender' => 'Gender',
            'uid' => 'Uid',
            'wechat' => 'Wechat',
            'ctime' => 'Ctime',
            'utime' => 'Utime',
        ];
    }


    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
        return static::findOne(['id' => $id]);

    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');

    }


    public function getId()
    {
        // TODO: Implement getId() method.
        return $this->getPrimaryKey();


    }



    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
        return $this->auth_key;

    }


    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
        return $this->getAuthKey() === $authKey;

    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }


    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public static function findUserInfo($email){
//        return static::findOne(['email' => $email]);
        return static::find()->where(["email"=>$email])->one();
    }
}
