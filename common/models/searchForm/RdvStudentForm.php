<?php

namespace common\models\searchForm;

use common\models\IpRdvStudent;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "{{%admin}}".
 *

 */
class RdvStudentForm extends Model
{

    public $id;
    public $pid;
    public $status;



    public function search($params)
    {
        $query = IpRdvStudent::find();

        // add conditions that should always apply here


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere([
            'status' => $this->status,
        ]);

        $query->andFilterWhere([
            'pid' => $this->pid,
        ]);

        return $dataProvider;
    }
}
