<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 04/01/2019
 * Time: 13:25
 */

namespace common\models\models;


use common\models\CarBrand;
use common\widgets\PublicFunctionUnion;
use yii\base\Model;
use yii\data\ActiveDataProvider;


class CarBrandForm extends Model
{

    public $id;
    public $bname;
    public $iconne;
    public $errors;
    public $isNewRecord = true;

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bname' => '品牌名',
            'iconne'=>'商标',
            'ctime' => 'Ctime',
        ];
    }



    public function rules()
    {
        return [
            [['bname','iconne'], 'required'],
            [['bname','iconne'], 'string', 'max' => 255],
        ];
    }



    public function newBrand(){
        $brand = new CarBrand();
        $brand->bname = $this->bname;
        $brand->ctime = PublicFunctionUnion::getTimeString();
        $brand->iconne = $this->iconne;
        if ($brand->save()){
            return true;
        }else{
            $this->errors = $brand->errors;
            return false;
        }
    }


    public function saveImage(){
        $path = "../../images/car/";
        if (!empty($_FILES[$this->formName()])){
            $file = $_FILES[$this->formName()];

            $ext = explode("/",$file['type']['iconne']);
            $md5 = md5_file($file['tmp_name']['iconne']);
            if (file_exists($path ."/". $md5 . "." . $ext[1])) {
                $this->iconne = $path."/".$md5.".".$ext[1];
            }else{
                move_uploaded_file($file['tmp_name']['iconne'], $path."/" . $md5 . "." . $ext[1]);
                $this->iconne = $path."/".$md5.".".$ext[1];
            }
        }
    }

    public function search($params)
    {
        $query = CarBrand::find();

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

        $query->andFilterWhere(['like', 'bname', $this->bname]);

        return $dataProvider;
    }

}