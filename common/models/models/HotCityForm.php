<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 25/01/2019
 * Time: 14:57
 */

namespace common\models\models;


use common\models\HotCity;
use common\widgets\PublicFunctionUnion;
use yii\base\Model;
use yii\data\ActiveDataProvider;


class HotCityForm extends Model
{

    public $id;

    public $name;

    public $counts;

    public $hots;

    public $pic;

    public $errors;

    public $isNewRecord = true;


    public $lat;

    public $lng;

    public function rules()
    {
        return [
//            [['name'], 'required'],
            [['counts', 'hots'], 'integer'],
            [['name',  'pic','lat', 'lng'], 'string', 'max' => 255],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '热门城市名称',
            'counts' => '总计',
            'hots' => '热度',
            'ctime' => 'Ctime',
            'pic' => '图片',
            'lat'=>'Lan',
            'lng'=>'Lng'
        ];
    }


    public function saveHotCity(){
        $hotCity = new HotCity();
        $hotCity->name = $this->name;
        $hotCity->counts = $this->counts;
        $hotCity->hots = $this->hots;
        $hotCity->pic = $this->pic;
        $hotCity->lat = $this->lat;
        $hotCity->lng = $this->lng;
        $hotCity->ctime = PublicFunctionUnion::getTimeString();
        if($hotCity->save()){
            return true;
        }else{
            $this->errors = $hotCity->errors;
            return false;
        }
    }


    public function search($params)
    {
        $query = HotCity::find();

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

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }


    public function saveImage(){
        $path = "../../images/hotcity/";
        if (!empty($_FILES[$this->formName()])){
            $file = $_FILES[$this->formName()];
            if($file['type']['pic']==null)
                return;
            $ext = explode("/",$file['type']['pic']);
            $md5 = md5_file($file['tmp_name']['pic']);
            if (file_exists($path ."/". $md5 . "." . $ext[1])) {
                $this->pic = $path."/".$md5.".".$ext[1];
            }else{
                move_uploaded_file($file['tmp_name']['pic'], $path."/" . $md5 . "." . $ext[1]);
                $this->pic = $path."/".$md5.".".$ext[1];
            }
        }
    }
}