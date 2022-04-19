<?php

namespace common\models\searchForm;

use common\models\IpRdvProfesseur;
use yii\base\Model;
use common\models\Admin;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "{{%admin}}".
 *
 * @property int $id
 * @property int $pid
 * @property array $sdate
 * @property array $stime
 * @property int $interval
 * @property string $utime
 * @property string $ctime
 */
class RdvProfesseurForm extends Model
{


    public $id;


    public function search($params)
    {
        $query = IpRdvProfesseur::find();

        // add conditions that should always apply here


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



        return $dataProvider;
    }
}
