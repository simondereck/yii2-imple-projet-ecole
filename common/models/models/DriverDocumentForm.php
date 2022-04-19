<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 08/01/2019
 * Time: 22:04
 */

namespace common\models\models;


use common\models\DriverDocuments;
use common\widgets\PublicFunctionUnion;
use yii\base\Model;


/**
 *
 * @property int $id
 * @property int $did
 * @property string $vtc
 * @property string $vtcNo
 * @property string $vtcInvaild
 * @property string $permis
 * @property string $permisNo
 * @property string $permisInvaild
 * @property int $status
 * @property string $ctime
 * @property string $info
 */


class DriverDocumentForm extends Model
{

    public $vtcNo;
    public $vtcInvaild;
    public $vtc;
    public $permisNo;
    public $permisInvaild;
    public $permis;
    public $ctime;
    public $did;
    public $errors;
    public $info;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['did', 'vtc', 'vtcNo', 'vtcInvaild', 'permis', 'permisNo', 'permisInvaild', 'status', 'ctime'], 'required'],
            [['did'], 'integer'],
            [['vtcInvaild', 'permisInvaild', 'ctime'], 'safe'],
            [['vtc', 'vtcNo', 'permis', 'permisNo'], 'string', 'max' => 255],
            [['info'],'string'],
            [['status'], 'integer', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'did' => '司机',
            'vtc' => 'Vtc图片',
            'vtcNo' => 'Vtc号码',
            'vtcInvaild' => 'Vtc有效期',
            'permis' => '驾驶证图片',
            'permisNo' => '驾驶证号码',
            'permisInvaild' => '驾驶证有效日期',
            'status' => '状态',
            'ctime' => '上传时间',
            'info'=>'附加信息'
        ];
    }



    public function saveDocument(){
        $document = new DriverDocuments();
        $document->did = $this->did;
        $document->vtc = $this->vtc;
        $document->vtcNo = $this->vtcNo;
        $document->vtcInvaild = $this->vtcInvaild;
        $document->permis = $this->permis;
        $document->permisNo = $this->permisNo;
        $document->permisInvaild = $this->permisInvaild;
        $document->ctime = PublicFunctionUnion::getTimeString();
        $document->info = $this->info;
        $document->status = 0;
        if ($document->save()){
            return true;
        }else{
            $this->errors = $document->errors;
            return false;
        }
    }




}