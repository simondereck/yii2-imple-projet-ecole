<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 07/02/2019
 * Time: 17:43
 */

namespace common\models\searchForm;


use common\models\IpCourseWare;
use common\models\IpCourseWareDetail;
use yii\base\Model;
use yii\data\ActiveDataProvider;


class CourseWareDetailSearchForm extends Model
{


    public $id;
    public $wid;
    public $data_url;
    public $ctime;
    public $utime;

    public function setWid($id){
        $this->wid = $id;
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'wid', 'data_url', 'ctime', 'utime'], 'required'],
            [['id', 'wid'], 'integer'],
            [['ctime', 'utime'], 'safe'],
            [['data_url'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'wid' => 'Wid',
            'data_url' => 'Data Url',
            'ctime' => 'Ctime',
            'utime' => 'Utime',
        ];
    }




    public function search($params)
    {
        IpCourseWareDetail::setPrix($this->wid);

        $query = IpCourseWareDetail::find();

        // add conditions that should always apply here

        $query->andFilterWhere([
            'wid'=>$this->wid
        ]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'wid'=>$this->wid
        ]);


        return $dataProvider;
    }








}
