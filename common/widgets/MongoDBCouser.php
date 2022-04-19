<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 19/01/2019
 * Time: 22:27
 */

namespace common\widgets;
use MongoDB;
use ReflectionClass;
use yii\base\Exception;

/**
 * Class MongoDBCouser
 * @package common\widgets
 * @property object $olderAttributtes;
 * @property boolean $isNewRecord;
 */

class MongoDBCouser
{


    public $isNewRecord = true;

    public $olderAttributtes;

    private $asArray = false;

    public static function tableName(){
        return "test.test";
    }

    private static $manager;


    private static function getManager()
    {
        if (self::$manager!=null){
            return self::$manager;
        } else{
            self::$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017/");
            return self::$manager;
        }
    }



    public static function  insert($document){
        try {
            $bulk = new MongoDB\Driver\BulkWrite();
            $bulk->insert($document);
            $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 60000);
            return $result = static::getManager()->executeBulkWrite(static::tableName(), $bulk, $writeConcern);

        }catch (MongoDB\Driver\Exception\BulkWriteException $e){
            return false;
        }
    }


    public static function update($where,$set,$options=['multi' => false, 'upsert' => false]){
        try{
            $value = ['$set'=>$set];
            $bulk = new MongoDB\Driver\BulkWrite();
            $bulk->update($where,$value,$options);
            $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 60000);
            return $result = static::getManager()->executeBulkWrite(static::tableName(), $bulk,$writeConcern);
        }catch (MongoDB\Driver\Exception\BulkWriteException $e){
            return false;
        }

    }




    public static function delete($where,$options=['limit'=>1]){
        try{
            $bulk = new MongoDB\Driver\BulkWrite();
            $bulk->delete($where,$options);
            $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 60000);
            return $result = static::getManager()->executeBulkWrite(static::tableName(), $bulk, $writeConcern);
        }catch (MongoDB\Driver\Exception\BulkWriteException $e){
            return false;
        }

    }


    public static function countByQuery($MongoQuery){

        if(gettype($MongoQuery)=="object"&&get_class($MongoQuery)=="common\widgets\mongoExt\MongoQuery") {
            $params = $MongoQuery->getQuery();

            $collections = explode(".",static::tableName());
            $command = new MongoDB\Driver\Command(['count' =>$collections[1], 'query' => $params["filiter"]]);
            $result = static::getManager()->executeCommand($collections[0], $command);
            $res = $result->toArray();
            $count = 0;
            if ($res) {
                $count = $res[0]->n;
            }

            return $count;

        }

        throw new Exception('query params are not right');
    }





    public static function find($MongoQuery){

        if(gettype($MongoQuery)=="object"&&get_class($MongoQuery)=="common\widgets\mongoExt\MongoQuery"){

            $params = $MongoQuery->getQuery();

            $query = new MongoDB\Driver\Query($params["filiter"], $params["options"]);
            $cursor = static::getManager()->executeQuery(static::tableName(), $query);

            $array = [];

            foreach ($cursor as $res){
                $item = [];
                if ($res){
                    foreach ($res as $key=>$value){
                        if($key=="_id"){
                            $item[$key] = new MongoDB\BSON\ObjectId($value);
                        }
                        $item[$key] = $value;
                    }
                    $array[] = $item;
                }
            }
            return $array;

        }

        throw new Exception('query params are not right');
    }




    public static function findOneByQuery($MongoQuery){


        if(gettype($MongoQuery)=="object"&&get_class($MongoQuery)=="common\widgets\mongoExt\MongoQuery"){

            $params = $MongoQuery->getQuery();
            $params["options"]['limit'] =  1;

            $query = new MongoDB\Driver\Query($params["filiter"],$params["options"]);
            $cursor = static::getManager()->executeQuery(static::tableName(), $query);
            $array = [];

            foreach ($cursor as $res){
                if ($res){
                    foreach ($res as $key=>$value){
                        $array[$key] = $value;
                    }
                }
            }
            return $array;
        }

        throw new Exception('query params are not right');

    }




    public static function findOne($filter,$options){
        try{
            $query = new MongoDB\Driver\Query($filter, $options);
            $cursor = static::getManager()->executeQuery(static::tableName(), $query);
            $array = [];

            foreach ($cursor as $res){
                if ($res){
                    foreach ($res as $key=>$value){
                        $array[$key] = $value;
                    }
                }
            }
            return $array;
        }catch (Exception $e){
            return false;
        }
    }

    public function load($data)
    {
        if (!empty($data)) {
            if (is_array($data)){
                $names = $this->attributes();
                foreach ($names as $name){
                    if (isset($data[$name])&&!empty($data[$name])){
                        $this->$name =  $data[$name];
                    }
                }
                return true;
            }else if (is_object($data)){
                $names = $this->attributes();
                foreach ($names as $name){
                    if (isset($data->$name)&&!empty($data->$name)){
                        $this->$name =  $data->$name;
                    }
                }
                return true;
            }

            return false;
        }
        return false;
    }




    public function asArray($value = true)
    {
        $this->asArray = $value;
        return $this;
    }


    public function attributes()
    {
        $class = new ReflectionClass($this);
        $names = [];

        foreach ($class->getProperties() as $property) {
            if (!$property->isStatic()) {
                $names[] = $property->getName();
            }
        }
        return $names;
    }


    public function save(){
        return static::insert($this->toArray());
    }


    public function toArray(){
        $names = $this->attributes();
        $array = array();
        foreach ($names as $name){
            if (isset($this->$name)&&!empty($this->$name)){
                $array[$name] = $this->$name;
            }
        }
        return $array;
    }


    public function vaild(){

    }


}