<?php

namespace common\models\searchForm;

use common\models\IpSwiper;
use yii\base\Model;
use common\models\Admin;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "{{%admin}}".
 *
 * @property int $id
 * @property string $path
 * @property string $ctime
 */
class SwiperForm extends Model
{

    public $id;
    public $path;
    public $ctime;



    public function search($params)
    {
        $query = IpSwiper::find();

        // add conditions that should always apply here


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);



        return $dataProvider;
    }
}
