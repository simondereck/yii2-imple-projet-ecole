<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 31/12/2018
 * Time: 18:26
 */

namespace common\models\models;


use common\models\DriverBasicInfo;
use common\widgets\PublicFunctionUnion;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "{{%dirver_basic_info}}".
 *
 * @property int $id
 * @property string $realname
 * @property int $did
 * @property string $headimage
 * @property string $telephone
 * @property string $birthday
 * @property string $career
 * @property string $wechat
 * @property int $city
 * @property string $education
 * @property int $ville
 * @property string $address
 * @property int $idcardtype
 * @property string $idcardno
 * @property string $idcardinvaild
 * @property int $sex
 * @property string $idcardimage
 * @property string $idcardperimage
 * @property int $status
 * @property string $info
 * @property string $ctime
 * @property string $entertime
 */


class DriverBasicInfoForm extends Model
{

    public $id;

    public $realname;
    public $sex;
    public $birthday;
    public $city;
    public $telephone;
    public $wechat;
    public $career;
    public $education;
    public $entertime;
    public $ville;
    public $address;
    public $idcardtype;
    public $idcardno;
    public $idcardinvaild;

    public $info;

    public $did;
    public $status = 0;//le error de baseinfo not use

    public $headimage;
    public $idcardimage;
    public $idcardperimage;

    public $errors;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['realname', 'did', 'headimage', 'telephone', 'birthday', 'wechat', 'city', 'ville', 'address', 'idcardtype', 'idcardno', 'idcardinvaild', 'sex', 'idcardimage', 'idcardperimage', 'status', 'entertime'], 'required'],
            [['did', 'city', 'ville', 'idcardtype', 'sex', 'status','id'], 'integer'],
            [['ctime'],'safe'],
            [['birthday', 'idcardinvaild',  'entertime'], 'string'],
            [['realname', 'headimage', 'telephone', 'career', 'wechat', 'education', 'address', 'idcardno', 'idcardimage', 'idcardperimage', 'info'], 'string', 'max' => 255],
        ];
    }




    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'realname' => '真名',
            'did' => '用户id',
            'headimage' => '头像',
            'telephone' => '电话号码',
            'birthday' => '生日',
            'career' => '职业',
            'wechat' => '微信',
            'city' => '家乡',
            'education' => '教育',
            'ville' => '常住城市',
            'address' => '居住地址',
            'idcardtype' => '身份卡类型',
            'idcardno' => '身份卡编号',
            'idcardinvaild' => '有效日期',
            'sex' => '性别',
            'idcardimage' => '身份卡图片',
            'idcardperimage' => '手持身份卡图片',
            'status' => '状态',
            'info' => '附加信息',
            'ctime' => '创建时间',
            'entertime' => '入境时间',
        ];
    }




    public function saveInfo(){
        $info = new DriverBasicInfo();
        $info->realname = $this->realname;
        $info->sex = $this->sex;
        $info->birthday = $this->birthday;
        $info->city = $this->city;
        $info->telephone = $this->telephone;
        $info->wechat = $this->wechat;
        $info->career = $this->career;
        $info->education = $this->education;
        $info->entertime = $this->entertime;
        $info->ville = $this->ville;
        $info->address = $this->address;
        $info->idcardtype  = $this->idcardtype;
        $info->idcardno = $this->idcardno;
        $info->idcardinvaild = $this->idcardinvaild;
        $info->did = $this->did;
        $info->status = $this->status;
        $info->ctime = PublicFunctionUnion::getTimeString();

        $info->headimage = $this->headimage;
        $info->idcardimage = $this->idcardimage;
        $info->idcardperimage = $this->idcardperimage;

        if ($info->save()){
            return $info;
        }else{
            $this->errors = $info->errors;
            return null;
        }
    }



    public function search($params)
    {
        $query = DriverBasicInfo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fail s
//             $query->where('permission>=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'did', $this->did]);

        return $dataProvider;
    }

}