<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 06/07/2019
 * Time: 20:16
 */

namespace console\controllers;


use common\models\mogo\CardShop;
use common\models\mogo\CardShopCategory;
use common\widgets\ApiRequestMethods;
use common\widgets\mongoExt\MongoQuery;
use yii\console\Controller;

class CardController extends Controller
{

    protected $appsecret = "qg22yt1d8uwi4d8yv8o9oodu3rv3obsq";
    protected $appkey ="l7e2w6u77nqip3ocywhd1m9sdtroehsn";
    protected $url = "http://www.37-express.com/api/service_json/";
    protected $payUrl = "http://www.37-express.com/api/service_checkout";



    protected function getExprssBasicPamams($method=null){
        $params = array();
        $timestramp = time();
        $sign = $this->appsecret."appkey".$this->appkey."method".$method."timestamp".$timestramp.$this->appsecret;
        $params['method'] = $method;
        $params['timestamp'] = $timestramp;
        $params['sign'] = strtoupper(md5($sign));
        $params['appkey'] = $this->appkey;
        return $params;
    }





    public function actionIndex(){

        $params = $this->getExprssBasicPamams('getPageView');
        $params["data"]["method"] = "getPageView";
        $params["data"]["type"] = "navigation";
        $params["data"]["code"] = "coupon-api-all";
        $request = new ApiRequestMethods();
        $request->init($this->url);
        $request->setParams(json_encode($params));
        $request->getRequestWithCurl();
        if($request->getResults()){
            $res = $request->getResults();
            $jsonObj = json_decode($res,true);
            if ($jsonObj["code"]==1){
                foreach ($jsonObj["data"]["items"][0]["content"] as $value){
                    $model = new CardShopCategory();
                    $model->load($value);
                    $model->save();
                }
            }
        }

        $query = new MongoQuery();
        $categories = CardShopCategory::find($query);
        foreach($categories as $category){
            $this->listShop($category);
        }
    }

    /**
     * @param $total
     * @param $size
     * page 当前页码
     * size 每页显示多少条数据
     * total 总数
     * limitPage 最大页码数
     */

    public function listShop($category,$page=1){

        $category["action"]->method;
        $params = $this->getExprssBasicPamams($category["action"]->method);

        $params["data"]["id"] = $category["action"]->data->type;
        $params["data"]["type"] = $category["action"]->data->type;
        $params["data"]["code"] = $category["action"]->data->code;
        $params["data"]["page"] = $page;
        $request = new ApiRequestMethods();
        $request->init($this->url);
        $request->setParams(json_encode($params));
        $request->getRequestWithCurl();
        if($request->getResults()){
            $res = $request->getResults();
            $jsonObj = json_decode($res,true);

            if ($jsonObj["code"]==1){

                if (isset($jsonObj["data"]["items"][$category["action"]->data->code])&&
                    $jsonObj["data"]["items"][$category["action"]->data->code]){
                    $arrayTemp = $jsonObj["data"]["items"][$category["action"]->data->code];
                    foreach ($arrayTemp as $item){
                        CardShop::$category = $category["action"]->data->code;
                        $shop = new CardShop();
                        $shop->load($item);
                        $shop->save();
                        echo $shop->title."\n";
                    }
                    if ($jsonObj["data"]["limitPage"]>$jsonObj["data"]["page"]){
                        $this->listShop($category,$page+1);
                    }
                }


            }

        }
    }






}