<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 25/06/2019
 * Time: 15:49
 */

namespace console\controllers;


use common\models\mogo\FindArticleModel;
use common\models\mogo\FindCategory;
use common\widgets\ApiRequestMethods;
use common\widgets\mongoExt\MongoQuery;
use common\widgets\PublicFunctionUnion;
use yii\console\Controller;

class ArticleController extends Controller
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



    public function actionJour(){
        $query = new MongoQuery();
        $categorys = FindCategory::find($query);
        foreach ($categorys as $category){
            echo $category["title"]."\n";
            $model = new FindCategory();
            $model->load($category);
            if (!$model->checkVaildByJour()){
                $this->requestItems($this->page,$this->size,$model);
                $model->utime = time();
                $model->total = $this->total;
                $model->save();
            }
        }
    }


    public function actionWeek(){
        $query = new MongoQuery();
        $categorys = FindCategory::find($query);

        foreach ($categorys as $category){
            echo $category["category"]."\n";
            $model = new FindCategory();
            $model->load($category);
            if (!$model->checkVaildByWeek()){
                $this->requestWeekItems($this->page,$this->size,$model->category);
                $model->utime = time();
                $model->total = $this->total;
                $model->save();
            }
        }
    }

    protected $size = 20;
    protected $page = 1;
    protected $total = 0;



//    protected function saveUpdateInfo($category){
//
//        $model = new FindCategory();
//        $model->utime = time();
//        $model->total = $this->total;
//        $model->save();
//    }

    protected function caculatePage($page,$size,$total,$category){
        echo "page:".$page." size:".$size." total:".$total."\n";
        $this->total = $total;
        if (ceil($total/$size)>$page){
            $this->requestItems($page+1,$size,$category);
        }
    }



    protected function requestItems($page=1,$size=20,$category){

        $params = $this->getExprssBasicPamams($category->method);
        $params['data']['code'] = $category->code;
        $params['data']['type'] = $category->type;
        $params['data']['page'] = $page;
        $params['data']['size'] = $size;
        $request = new ApiRequestMethods();
        $request->init($this->url);
        $request->setParams(json_encode($params));
        $request->getRequestWithCurl();
        if ($request->getResults()) {
            $res = $request->getResults();
            $jsonObj = json_decode($res);
            if ($jsonObj->code == 1) {
                $code = $category->code;
                if (isset($jsonObj->data->items->$code)&&$jsonObj->data->items->$code){
                    foreach($jsonObj->data->items->$code as $key => $article){
                        FindArticleModel::$category = $category->code;
                        $articleModel  = new FindArticleModel();
                        $articleModel->load($article);
                        $articleModel->saveForConsole();
                    }
                }

            }
            $this->caculatePage($jsonObj->data->page,$jsonObj->data->size,$jsonObj->data->total,$category);
        }

    }


    protected function requestWeekItems($page=1,$size=20,$category){

        $params = $this->getExprssBasicPamams($category->method);
        $params['data']['code'] = $category->code;
        $params['data']['type'] = $category->type;
        $params['data']['page'] = $page;
        $params['data']['size'] = $size;
        $request = new ApiRequestMethods();
        $request->init($this->url);
        $request->setParams(json_encode($params));
        $request->getRequestWithCurl();
        if ($request->getResults()) {
            $res = $request->getResults();
            $jsonObj = json_decode($res);
            if ($jsonObj->code == 1) {
                $code = $category->code;
                if (isset($jsonObj->data->items->$code)&&$jsonObj->data->items->$code){
                    foreach($jsonObj->data->items->$code as $key => $article){
                        FindArticleModel::$category = $category->code;
                        $articleModel  = new FindArticleModel();
                        $articleModel->load($article);
                        $articleModel->save();
                    }
                }

            }
            $this->caculatePage($jsonObj->data->page,$jsonObj->data->size,$jsonObj->data->total,$category);
        }

    }


    public function actionCategorys(){
        $params = $this->getExprssBasicPamams('getPageView');
        $params['data']['code'] = "discover";
        $params['data']['type'] = "navigation";
        $request = new ApiRequestMethods();
        $request->init($this->url);
        $request->setParams(json_encode($params));
        $request->getRequestWithCurl();
        if ($request->getResults()) {
            $res = $request->getResults();
            $jsonObj = json_decode($res);
            if ($jsonObj->code == 1) {
                if(isset($jsonObj->data->items[0]->content)&&$jsonObj->data->items[0]->content){
                    foreach ($jsonObj->data->items[0]->content as $item){
                        $category = new FindCategory();
                        $category->title = $item->title;
                        $category->method = $item->action->method;
                        $category->code = $item->action->data->code;
                        $category->type = $item->action->data->type;
                        $category->status = 1;
                        $category->ctime = PublicFunctionUnion::getTimeString();
                        $category->save();
                    }
                }

            }
        }

    }


}