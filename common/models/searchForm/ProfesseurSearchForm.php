<?php

namespace common\models\searchForm;

use common\models\IpProfessuer;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property int $id
 * @property string $path
 * @property string $name
 * @property string $description
 * @property int $status
 * @property string $utime
 * @property string $ctime
 */
class ProfesseurSearchForm extends Model
{



    public $id;
    public $description;
    public $path;
    public $name;
    public $status;
    public $utime;
    public $ctime;


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => '封面',
            'name'=>'名字',
            'description' => '正文',
            'status' => '状态',
            'utime' => '更新时间',
            'ctime' => '创建时间',
        ];
    }


    public function search($params)
    {
        $query = IpProfessuer::find();

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


        $query->andFilterWhere([
            'status'=>$this->status
        ]);


        return $dataProvider;
    }
}
