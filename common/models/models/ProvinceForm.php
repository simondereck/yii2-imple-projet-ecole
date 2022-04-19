<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 26/12/2018
 * Time: 10:49
 */

namespace common\models\models;


use common\models\ProvinceChina;

use yii\data\ActiveDataProvider;


class ProvinceForm extends \common\models\ProvinceChina
{



    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub

    }



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pname' => '省名',
            'ctime' => '创建时间',
        ];
    }


    public function search($params)
    {
        $query = ProvinceChina::find();

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

        $query->andFilterWhere(['like', 'pname', $this->pname]);

        return $dataProvider;
    }

}