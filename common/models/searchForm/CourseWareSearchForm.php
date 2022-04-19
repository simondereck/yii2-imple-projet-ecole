<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 07/02/2019
 * Time: 17:43
 */

namespace common\models\searchForm;


use common\models\IpCourseWare;
use yii\base\Model;
use yii\data\ActiveDataProvider;


class CourseWareSearchForm extends Model
{



    public $id;
    public $cours;
    public $image;
    public $year;
    public $faculty;
    public $session;
    public $description;
    public $ctime;
    public $utime;

    /**
     * @inheritdoc
     */

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cours', 'image','year', 'faculty', 'session', 'description', 'ctime', 'utime'], 'required'],
            [['cours', 'year', 'faculty', 'session'], 'integer'],
            [['description'], 'string'],
            [['ctime', 'utime'], 'safe'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cours' => 'Cours',
            'image' => 'Image',
            'year' => 'Year',
            'faculty' => 'Faculty',
            'session' => 'Session',
            'description' => 'Description',
            'ctime' => 'Ctime',
            'utime' => 'Utime',
        ];
    }



    public function search($params)
    {
        $query = IpCourseWare::find();

        // add conditions that should always apply here

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
        ]);

        $query->andFilterWhere(['like', 'cours', $this->cours]);

        return $dataProvider;
    }








}
