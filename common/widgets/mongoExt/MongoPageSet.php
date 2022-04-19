<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 28/05/2019
 * Time: 11:40
 */
namespace common\widgets\mongoExt;
use common\widgets\PublicFunctionUnion;
use yii\base\BaseObject;
use yii\base\Model;

/**
 * Class MongoPageSet
 * @property int $skip;
 * @property int $limit;
 * @property int $total;
 * @property int $pages;
 */

class MongoPageSet extends BaseObject
{
    public $total;
    public $skip = 0;
    public $limit = 20;
    public $pages;


    public function load($data, $formName = "PageSet")
    {
        parent::load($data, $formName);

    }


    /**
     * @param int $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
        $this->pages = ceil($this->total/$this->limit);
    }






    public function setLimit($limit){
        $this->limit = $limit;
    }



    public function setSkip($skip)
    {
        $this->skip = $skip;

        if ($this->skip >=  $this->total ){
            return false;
        }

        return true;
    }




}