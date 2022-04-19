<?php

namespace common\models\searchForm;

use yii\base\Model;
use common\models\Admin;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "{{%admin}}".
 *
 * @property int $id
 * @property string $name
 * @property string $password
 * @property string $email
 * @property int $permission
 * @property int $block
 * @property string $auth_key
 * @property string $password_reset_token
 * @property string $display_name
 * @property string $ctime
 */
class AdminSearchForm extends Model
{
//    const Block = 0;

    public $id;
    public $name;

    public $password;
    public $email;
    public $permission;
    public $block;
    public $auth_key;
    public $password_reset_token;
    public $display_name;
    public $ctime;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'password', 'email', 'permission', 'block', 'display_name', 'ctime'], 'required'],
            [['permission', 'block'], 'integer'],
            [['name',"email"], 'trim'],
            [['ctime'], 'safe'],
            [['name', 'password', 'email', 'auth_key', 'password_reset_token', 'display_name'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '姓名',
            'password' => '密码',
            'email' => '邮箱',
            'permission' => '0超级管理员,1普通管理员',
            'display_name' => '显示名',
            'block' => '赋权',
            'ctime' => 'Ctime',
        ];
    }


    public function search($params)
    {
        $query = Admin::find();

        // add conditions that should always apply here

        $query->where("id>:id",[":id"=>1]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {

            return $dataProvider;
        }


        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);


        return $dataProvider;
    }
}
