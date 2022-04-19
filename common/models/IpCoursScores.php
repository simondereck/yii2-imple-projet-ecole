<?php

namespace common\models;

use common\widgets\PublicFunctionUnion;
use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "ip_cours_scores".
 *
 * @property int $id
 * @property int $cid
 * @property array $cours
 * @property int $status
 * @property string $utime
 * @property string $ctime
 */
class IpCoursScores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ip_cours_scores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cid', 'cours', 'status', 'utime', 'ctime'], 'required'],
            [['cid', 'status'], 'integer'],
            [['cours', 'utime', 'ctime'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cid' => 'Cid',
            'cours' => 'Cours',
            'status' => 'Status',
            'utime' => 'Utime',
            'ctime' => 'Ctime',
        ];
    }


    public $options;

    public function loadOptions($json){

        $options = Json::decode($json);

        $array = [];
        foreach ($options['ness'] as $name => $ness){
            $item = new ScoreModel();
            $item->matiere = $name;
            $item->notes = 0;
            $item->ects = $ness;
            $item->coefs = 0;
            $item->validee = "Oui";
            $item->points = 0;
            $item->ects1 = 0;
            $array['items'][] = $item;
        }


        foreach ($options['opt'] as $key=> $opt){
            $item = new ScoreModel();
            $item->matiere = $key;
            $item->notes = 0;
            $item->ects = $opt;
            $item->coefs = 0;
            $item->validee = "Oui";
            $item->points = 0;
            $item->ects1 = 0;
            $array['items'][] = $item;
        }


        $array['total']['ects'] = 0;
        $array['total']['coefs'] = 0;
        $array['total']['points'] = 0;
        $array['total']['ects1'] = 0;

        $this->options = $array;

    }
}
