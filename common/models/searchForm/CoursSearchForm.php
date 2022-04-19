<?php

namespace common\models\searchForm;

use common\models\Cours;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "{{%cours}}".
 *
 * @property int $id
 * @property string $name
 * @property string $descript
 */
class CoursSearchForm extends Model
{

    public $id;
    public $name;
    public $descript;

    public function rules()
    {
        return [
            [['name', 'descript'], 'required'],
            [['name', 'descript'], 'string', 'max' => 255]
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
            'descript' => 'Description',
        ];
    }


    public function search($params)
    {
        $query = Cours::find();

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

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
