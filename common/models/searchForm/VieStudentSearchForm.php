<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 07/02/2019
 * Time: 17:43
 */

namespace common\models\searchForm;


use common\models\IpVieStudent;
use yii\base\Model;
use common\models\Car;
use common\widgets\PublicFunctionUnion;
use yii\data\ActiveDataProvider;


class VieStudentSearchForm extends Model
{

    public $id;
    public $title;
    public $text;
    public $cover;
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
            'title' => '标题',
            'text' => '正文',
            'cover' => '封面',
            'ctime'=>'创建时间',
            'utime'=>'更新时间',
        ];
    }




    public function search($params)
    {
        $query = IpVieStudent::find();

        // add conditions that should always apply here
//        $query->orderBy(['id'=>SORT_DESC]);

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

        $query->andFilterWhere([
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }








}
