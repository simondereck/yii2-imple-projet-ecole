<?php

namespace common\models\searchForm;

use common\models\Demander;
use common\models\IpDemanderFle;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "{{%ip_ demander}}".
 *
 * @property int $id
 * @property int $gender 0 madame 1 mademoiselle 2 monsieur
 * @property string $name
 * @property string $firstname
 * @property string $birthday
 * @property string $payer
 * @property string $sociale
 * @property int $profession
 * @property string $rue
 * @property string $code
 * @property string $city
 * @property string $telephone
 * @property string $email
 * @property int $level
 * @property int $status 0 wait 1 success 2 block
 * @property string $ctime
 */
class FleDemanderSearchForm extends Model
{


    public $id;
    public $gender;
    public $name;
    public $firstname;
    public $birthday;
    public $payer;
    public $sociale;
    public $profession;
    public $rue;
    public $code;
    public $city;
    public $telephone;
    public $email;
    public $level;
    public $status;
    public $ctime;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    public function rules()
    {
        return [
            [['gender', 'name', 'firstname', 'birthday', 'payer', 'profession', 'rue', 'code', 'city', 'telephone', 'email', 'level', 'status', 'ctime'], 'required'],
            [['birthday', 'ctime'], 'safe'],
            [['profession','level'], 'integer'],
            [['rue'], 'string'],
            [['gender', 'status'], 'string', 'max' => 4],
            [['name', 'firstname', 'payer', 'sociale', 'code', 'city', 'telephone', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gender' => 'Gender',
            'name' => 'Name',
            'firstname' => 'Firstname',
            'birthday' => 'Birthday',
            'payer' => 'Payer',
            'sociale' => 'Sociale',
            'profession' => 'Profession',
            'rue' => 'Rue',
            'code' => 'Code',
            'city' => 'City',
            'telephone' => 'Telephone',
            'email' => 'Email',
            'level' => 'Level',
            'status' => 'Status',
            'ctime' => 'Ctime',
        ];
    }


    public function search($params)
    {
        $query = IpDemanderFle::find();

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
        $query->andFilterWhere(['like', 'email', $this->email]);
        $query->andFilterWhere(['like', 'telephone', $this->telephone]);
        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like','firstname',$this->firstname]);


        return $dataProvider;
    }





    public function searchScore($params){

        $query = IpDemanderFle::find();

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
