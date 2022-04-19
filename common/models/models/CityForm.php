<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 26/12/2018
 * Time: 15:35
 */

namespace common\models\models;


use common\models\CityChina;

use yii\data\ActiveDataProvider;

class CityForm extends CityChina
{

    public function rules()
    {
        return [
            [['cname', 'ctime', 'pid'], 'required'],
            [['ctime'], 'safe'],
            [['pid'], 'integer'],
            [['cname'], 'string', 'max' => 255],
            [['cname'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cname' => '城市名',
            'ctime' => 'Ctime',
            'pid' => '省',
        ];
    }


    public function search($params)
    {
        $query = CityChina::find();

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

        $query->andFilterWhere(['like', 'cname', $this->cname]);

        return $dataProvider;
    }

}