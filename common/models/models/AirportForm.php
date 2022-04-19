<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 07/02/2019
 * Time: 16:06
 */

namespace common\models\models;


use common\models\Airport;
use yii\base\Model;
use common\widgets\PublicFunctionUnion;
use yii\data\ActiveDataProvider;

class AirportForm extends Model
{

    public $id;
    public $ville;
    public $aname;
    public $ano;
    public $errors;



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ville', 'aname'], 'required'],
            [['aname','ano'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ano' => 'AirportNo',
            'ville' => 'Ville',
            'aname' => 'Aname',
            'ctime' => 'Ctime',
        ];
    }



    public function newAirport(){
        $airport = new Airport();
        $airport->aname = $this->aname;
        $airport->ville = $this->ville;
        $airport->ano = $this->ano;
        $airport->ctime = PublicFunctionUnion::getTimeString();
        if ($airport->save()){
            return true;
        }else{
            $this->errors = $airport->errors;
            return false;
        }
    }




    public function search($params)
    {
        $query = Airport::find();

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

        $query->andFilterWhere(['like', 'aname', $this->aname]);

        return $dataProvider;
    }

}