<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 21/01/2019
 * Time: 16:28
 */

namespace common\widgets\mongoExt;
//['key' => ['$regex' => '(?i)value']]

class MongoQuery
{

    const SORT_DESC = 1;
    const SORT_ASC = -1;

    public $opts = [
        'in' => '$in',
        'not in'=>'$nin',
        'or' =>'$or',
        'and' => '$and',
        'not' =>'$not',
        'not and' =>'$nor',
        'exists' => '$exists',
        'type'=>'$type',
        'sort'=>'sort',
        'limit'=>'$limit',
    ];

    public $optsSingle = [
        '=' => '$eq',
        '>' => '$gt',
        '>=' => '$gte',
        '<'  => '$lt',
        '<=' => '$lte',
        '!=' => '$ne',
        'like'=>'$regex'
    ];



    private $options = array();

    private $filiter = array();


    public function sort($label,$sort="desc"){
        if (strtolower($sort)=="desc"){
            $this->options['sort'] = [ $label => MongoQuery::SORT_DESC ];
        }else{
            $this->options['sort'] = [ $label => MongoQuery::SORT_ASC ];
        }
    }

    public function __construct()
    {
        $this->options = [
            'projection'=>['_id'=>0]
        ];
    }

    public function addId(){
        $this->options ['projection']= ['_id'=>1];
    }

    public function addLikeCondition($params){
        if(is_array($params)){
            foreach ($params as $key=>$value){
                $this->filiter[$key] = [$this->optsSingle['like']=>"(?i)".$value];
            }
        }

    }

    public function addCondition($opt,$params){
        if(isset($this->optsSingle[$opt])){
            if(is_array($params)){
                foreach ($params as $key=>$value){
                    $this->filiter[$key] = [$this->optsSingle[$opt]=>$value];
                }
            }
        }
    }



    public function addNotInCondition($conditions){
        $this->filiter['$nin'] = $conditions;
    }


    public function addOrCondition($conditions){
        $this->filiter['$or'] = $conditions;
    }

    public function addOrConditions($condition){
        if (isset($this->filiter['$or'])&&$this->filiter['$or']){
            $this->filiter['$or'][] = $condition;
        }else{
            $this->filiter['$or'] = [];
            $this->filiter['$or'] = $condition;
        }
    }

    public function addAndCondition($conditions){
        $this->filiter['$and'] = $conditions;
    }

    public function addAndConditions($condition){
        if (isset($this->filiter['$and'])&&$this->filiter['$and']){
            $this->filiter['$and'][] = $condition;
        }else{
            $this->filiter['$and'] = [];
            $this->filiter['$and'] = $condition;
        }
    }

    public function addInCondition($conditions){
        $this->filiter['$in'] = $conditions;
    }


    public function addExistsCondition($fliter,$conditions){
        $this->filiter[$fliter] = $conditions;
    }

    public function limit($limit=20){
        $this->options['limit'] = $limit;
    }

    public function skip($skip){
        $this->options['skip'] = $skip;
    }

    public function getQuery(){
        return ["options"=>$this->options,"filiter"=>$this->filiter];
    }
}