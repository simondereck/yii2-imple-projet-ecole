<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 04/01/2019
 * Time: 19:44
 */

namespace common\models\models;


use common\models\CarInfo;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\widgets\PublicFunctionUnion;

class CarInfoForm extends Model
{


    public $id;
    public $brand;
    public $seats;
    public $errors;
    public $grise;
    public $griseNo;
    public $griseInvaild;
    public $carNo;
    public $did;
    public $status;
    public $color;



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['did', 'brand', 'seats', 'grise', 'griseNo', 'griseInvaild', 'carNo', 'status', 'color'], 'required'],
            [['did', 'brand', 'seats', 'status', 'color'], 'integer'],
            [['griseInvaild'], 'safe'],
            [['grise', 'griseNo', 'carNo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'did' => 'Did',
            'brand' => '品牌',
            'seats' => '座位',
            'grise' => '灰卡',
            'griseNo' => '灰卡号码',
            'griseInvaild' => '灰卡有效期',
            'carNo' => '车牌号码',
            'status' => '状态',
            'color' => '颜色',
            'ctime' => '创建时间',
        ];

    }


    public function newInfo(){
        $info = new CarInfo();
        $info->ctime = PublicFunctionUnion::getTimeString();
        $info->seats = $this->seats;
        $info->brand = $this->brand;
        $info->seats = $this->seats;
        $info->status = 0;
        $info->grise = $this->grise;
        $info->griseNo = $this->griseNo;
        $info->griseInvaild = $this->griseInvaild;
        $info->color = $this->color;
        $info->did = $this->did;
        $info->carNo = $this->carNo;
        if ($info->save()){
            return true;
        }else{
            $this->errors = $info->errors;
            return false;
        }
    }


    public function saveImage(){
        $path = "../../images/car/";
        if (!empty($_FILES[$this->formName()])){
            $file = $_FILES[$this->formName()];

            $ext = explode("/",$file['type']['pic']);
            $md5 = md5_file($file['tmp_name']['pic']);
            if (file_exists($path ."/". $md5 . "." . $ext[1])) {
                $this->iconne = $path."/".$md5.".".$ext[1];
            }else{
                move_uploaded_file($file['tmp_name']['pic'], $path."/" . $md5 . "." . $ext[1]);
                $this->iconne = $path."/".$md5.".".$ext[1];
            }
        }
    }

    public function search($params)
    {
        $query = CarInfo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
//             $query->where('permission>=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->bname]);

        return $dataProvider;
    }
}