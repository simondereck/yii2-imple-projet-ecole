<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 19/06/2019
 * Time: 19:26
 */

namespace console\controllers;


use common\models\mogo\AddressModel;
use yii\console\Controller;
use common\models\mogo\OrderModel;
use common\widgets\mongoExt\MongoQuery;
use common\widgets\PublicFunctionUnion;


class AddressController extends Controller
{

    public function actionIndex($date=null){
        if ($date==null)
            $date = PublicFunctionUnion::getDateString();

        $query = new MongoQuery();
        $query->addAndCondition([
            ['ctime'=>['$gte'=>$date." 00:00:00"]],
            ['ctime'=>['$lte'=>$date." 23:59:59"]],
            ['model'=>['$gt'=>OrderModel::DAY]]
        ]);

        $orders = OrderModel::find($query);

        if ($orders){
            foreach ($orders as $order){
                if ($order["model"]==2){
                    $model = new AddressModel();
                    $model->getAddressByUid($order["uid"]);
                    $model->cmpAddress(json_decode($order["origin"],true));
                    $model->cmpAddress(json_decode($order["des"],true));
                    $model->save();
                }else{
                    $model = new AddressModel();
                    $model->getAddressByUid($order["uid"]);
                    $model->cmpAddress(json_decode($order["address"],true));
                    $model->save();
                }
            }
        }
    }


    public function actionBefore($date=null){
        if ($date==null)
            $date = PublicFunctionUnion::getDateString();

        $query = new MongoQuery();
        $query->addAndCondition([
            ['ctime'=>['$lte'=>$date." 23:59:59"]],
            ['model'=>['$gt'=>OrderModel::DAY]]
        ]);

        $orders = OrderModel::find($query);

        if ($orders){
            foreach ($orders as $order){
                if ($order["model"]==2){
                    $model = new AddressModel();
                    $model->getAddressByUid($order["uid"]);
                    $model->cmpAddress(json_decode($order["origin"],true));
                    $model->cmpAddress(json_decode($order["des"],true));
                    $model->save();
                }else{
                    $model = new AddressModel();
                    $model->getAddressByUid($order["uid"]);
                    $model->cmpAddress(json_decode($order["address"],true));
                    $model->save();
                }
            }
        }
    }


}