<?php

namespace common\models\searchForm;

use common\models\CoursProgram;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "{{%cours_program}}".
 *
 * @property int $id
 * @property string $year
 * @property string $faculty
 * @property string $ctime
 * @property string $ness
 * @property string $opt
 * @property string $session
 */
class CoursprogramSearchForm extends Model
{

    public $id;
    public $year;
    public $faculty;
    public $ctime;
    public $ness;
    public $opt;
    public $session;

    public function rules()
    {
        return [
            [['year', 'faculty', 'ctime', 'ness', 'session'], 'required'],
            [['ctime'], 'safe'],
            [['ness', 'opt', 'year', 'faculty', 'session'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'year' => 'Year',
            'faculty' => 'Faculty',
            'ctime' => 'Ctime',
            'ness' => 'Ness',
            'opt' => 'Opt',
            'session' => 'Session',
        ];
    }

    public function search($params)
    {
        $query = CoursProgram::find();

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

        //$query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
