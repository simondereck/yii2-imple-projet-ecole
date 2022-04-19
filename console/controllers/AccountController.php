<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 25/08/2019
 * Time: 16:19
 */

namespace console\controllers;

use common\models\Driver;
use common\models\DriverBasicInfo;
use common\models\mogo\DriverAccountModel;
use common\models\mogo\DriverMontModel;
use common\widgets\PublicFunctionUnion;
use common\models\mogo\OrderModel;
use common\widgets\mongoExt\MongoQuery;

class AccountController extends \yii\console\Controller
{


    public function actionIndex(){
        $query = new MongoQuery();
        $date = date('Y-m-d', strtotime('-1 days'));
        $query->addAndCondition([["ctime"=>['$lte'=>$date." 23:59:59"]],["ctime"=>['$gte'=>$date." 00:00:00"]]]);
        $query->addCondition("=",["status"=>OrderModel::FININ]);

        $orders = OrderModel::find($query);
        if ($orders){
            foreach ($orders as $order){
                $this->setItem($order);
            }
        }
    }


//    public function actionFix(){
//        $date = "2019-09-05";
//        $query = new MongoQuery();
////        $query->addAndCondition([["ctime"=>['$lte'=>$date." 23:59:59"]],["ctime"=>['$gte'=>$date." 00:00:00"]]]);
//        $query->addCondition("<=",["ctime"=>"2019-09-08 23.59.59"]);
//        $query->addCondition("=",["status"=>OrderModel::FININ]);
//        $orders = OrderModel::find($query);
//        if ($orders){
//            foreach ($orders as $order){
//                echo "\n";
//                var_dump($order);
//            }
//
//        }
//
//    }



    private function setItem($order){
        //设置流水
        $query = new MongoQuery();
        $query->addCondition("=",["did"=>$order["did"]]);
        $account = DriverAccountModel::findOneByQuery($query);
        if($account){
            $account["total"] = $account["total"] + $order["price"];
            DriverAccountModel::update(["did"=>$order["did"]],["total"=>$account["total"]]);
        }else{
            $driver = Driver::findOne(["id"=>$order["did"]]);
            $driverMont = new DriverAccountModel();
            $driverMont->did = $order["did"];
            $driverMont->telephone = $driver->telephone;
            $driverMont->total = $order["price"];
            $driverMont->residue = 0;
            $driverMont->email = $driver->email;
            $driverMont->photoImage = DriverBasicInfo::findOne(["did"=>$order["did"]])->headimage;
            $driverMont->utime = PublicFunctionUnion::getTimeString();
            $driverMont->save();
        }

        DriverMontModel::setFix(PublicFunctionUnion::setDateFlex($order["etime"]));
        $model = new DriverMontModel();
        $model->did = $order["did"];
        $model->orid = $order["orid"];
        $model->price = $order["price"];
        $model->ctime = PublicFunctionUnion::getTimeString();
        $model->etime = $order["etime"];
        $model->save();

    }


    public function actionFix(){

        $query = new MongoQuery();
        $query->addCondition("<=",["ctime"=>"2019-09-08 23:59:59"]);
        $query->addCondition("=",["status"=>OrderModel::FININ]);
        $orders = OrderModel::find($query);

        foreach ($orders as $order){
            if(!isset($order["did"])){
                OrderModel::delete(["orid"=>$order["orid"]]);
                echo $order["orid"]."\n";
            }
        }


    }





}