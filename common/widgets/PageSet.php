<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 13/05/2019
 * Time: 17:47
 */

namespace common\widgets;


use yii\base\Model;

class PageSet extends Model
{


    private $offset = 0;
    private $limit = 20;
    private $total;
    private $pageCount;
    private $page;

    public function setTotal($toatl){
        $this->total = $toatl;
        $this->pageCount = (int)ceil($this->total/$this->limit);
    }

    public function setPageSize($limit){
        $this->limit = $limit;
        $this->pageCount =(int) ceil($this->total/$this->limit);
    }

    public function getOffset()
    {
        $this->offset =  ($this->page-1)* $this->limit;
        return $this->offset;
    }


    public function getLimit(){
        return $this->limit;
    }

    public function setPage($page){
        if ($page>$this->pageCount){
            $this->page = 1;
        }else{
            $this->page = $page;
        }
    }

    public function getPage(){
        if ($this->pageCount>$this->page){
            return $this->page+1;
        }
        return 0;
    }

    /**
     * @return mixed
     */
    public function getPageCount()
    {
        return $this->pageCount;
    }
}