<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 01/07/2019
 * Time: 17:37
 */

namespace console\controllers;


use carleader\models\CarleaderModel;
use carleader\models\LeaderBrandModel;
use common\models\Car;
use common\widgets\mongoExt\MongoQuery;
use common\widgets\PublicFunctionUnion;
use yii\console\Controller;

class CarController extends Controller
{
    public $url = "https://www.edpauto.fr/api/v1/offers";

    public $changedUrl = "https://www.edpauto.fr/api/v1/changed_offers";

    public $layout = null;

    public $utime = "";

    public function actionError(){
        return $this->response(["status"=>0,"message"=>"您的访问有误！"]);
    }

    protected $token = "I0BNI25NPPwKCpH2zufeh47oOhTAzhaa1eaMTIJMHGbXX15RNdUZXvmUMCUbGfUg";


    protected function request($post){
        $ch = curl_init($this->url."?".http_build_query($post));
        $authorization = "Authorization: Bearer ".$this->token;
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization )); // Inject the token into the header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }


    protected function save($data){
        foreach ($data as $car){
            $carleaderModel = new CarleaderModel();
            $carleaderModel->load($car);
            $carleaderModel->utime = $this->utime;
            $carleaderModel->save();
            $brand = new LeaderBrandModel();
            $brand->addBrandAndModel($carleaderModel->brand,$carleaderModel->model);
            echo $carleaderModel->brand."\n";
        }


    }

    protected function update($data){
        foreach ($data as $car){
            if(isset($car->deleted)&&$car->deleted){
                CarleaderModel::delete("id=".$car->id);
                continue;
            }
            $carleaderModel = new CarleaderModel();
            $carleaderModel->load($car);
            $carleaderModel->utime = $this->utime;
            $carleaderModel->save();
            $brand = new LeaderBrandModel();
            $brand->addBrandAndModel($carleaderModel->brand,$carleaderModel->model);
            echo $carleaderModel->brand."\n";
        }

    }

    public function actionIndex(){
        $post = [
            'page'=>1,
            'selling_prices'=>false
        ];
        $res = $this->request($post);
        $this->utime = PublicFunctionUnion::getTimeString();
        if ($res){
            $jsonObj = json_decode($res);
            if ($jsonObj->data&&$jsonObj->meta){
                for ($i=1;$i<$jsonObj->meta->last_page;$i++){
                    $post["page"] = $i;
                    $res_for = $this->request($post);
                    if ($res_for){
                        $jsonObj_for = json_decode($res_for);
                        $this->save($jsonObj_for->data);
                    }
                }
            }
        }
        $this->deleteOldCar();
    }


    /**
     * get diff
     */
    public function deleteOldCar(){
        $query = new MongoQuery();
        $query->addCondition("<",["utime"=>$this->utime]);
        $car = CarleaderModel::findOneByQuery($query);
        if($car){
            CarleaderModel::delete(["id"=>$car["id"]]);
            $this->deleteOldCar();
        }
    }

    protected function requestChanged($post){
        $ch = curl_init($this->changedUrl."?".http_build_query($post));
        $authorization = "Authorization: Bearer ".$this->token;
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization )); // Inject the token into the header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function actionChanged(){
        $time = time()-3600*3;
        $post = [
            'page'=>1,
            'selling_prices'=>true,
            'changed_after'=>$time
        ];
        $res = $this->requestChanged($post);
        if ($res){
            $jsonObj = json_decode($res);
            if ($jsonObj->data&&$jsonObj->meta){
                for ($i=0;$i<$jsonObj->meta->last_page;$i++){
                    $post["page"] = $i;
                    $res_for = $this->requestChanged($post);
                    if ($res_for){
                        $jsonObj_for = json_decode($res_for);
                        $this->update($jsonObj_for->data);
                    }
                }
            }
        }
    }


}