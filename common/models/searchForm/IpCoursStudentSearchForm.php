<?php

namespace common\models\searchForm;

use common\models\Demander;
use common\models\IpCoursStudents;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "{{%ip_cours_students}}".
 *
 * @property int $id
 * @property int $sid
 * @property int $year
 * @property int $session
 * @property int $faculty
 * @property array $cours
 * @property string $ctime
 * @property int $status
 */
class IpCoursStudentSearchForm extends Model
{

    public $id;
    public $sid;
    public $year;
    public $session;
    public $faculty;
    public $status;



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sid' => 'Sid',
            'year' => 'Year',
            'session' => 'Session',
            'faculty' => 'Faculty',
            'cours' => 'Cours',
            'status'=>'Status',
            'ctime' => 'Ctime',
        ];
    }


    public function search($params)
    {
        $query = IpCoursStudents::find();

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

        $query->andFilterWhere(['status'=>$this->status]);

        $query->andFilterWhere(['sid'=>$this->sid]);
        $query->andFilterWhere(['year'=>$this->year]);
        $query->andFilterWhere(['session'=>$this->session]);
        $query->andFilterWhere(['faculty'=>$this->faculty]);


        return $dataProvider;
    }



    public function searchYear($params){

        $query = Demander::find();

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

        $query->andFilterWhere(['status'=>$this->status]);

        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like','firstname',$this->firstname]);


        return $dataProvider;

    }

    public function searchScore($params){

        $query = Demander::find();

        // add conditions that should always apply here

        $query->where(['status'=>1]);

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

        $query->andFilterWhere(['status'=>$this->status]);

        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like','firstname',$this->firstname]);


        return $dataProvider;
    }
}
