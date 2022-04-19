<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 07/02/2019
 * Time: 12:21
 */

namespace common\models\models;


use common\models\CityDeAirport;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\widgets\PublicFunctionUnion;

class CityDeAirportForm extends Model
{

    public $id;
    public $name;
    public $errors;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
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
            'ctime' => 'Ctime',
        ];
    }

    public function newCity(){
        $city = new CityDeAirport();
        $city->name = $this->name;
        $city->ctime = PublicFunctionUnion::getTimeString();

        if ($city->save()){
            return true;
        }else{
            $this->errors = $city->errors;
            return false;
        }
    }


    public function search($params)
    {
        $query = CityDeAirport::find();

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
}