<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018/1/8
 * Time: 下午6:51
 * this class use for request other website use url
 */

namespace common\widgets;


class ApiRequestMethods
{
    public static $METHOD_POST = 'POST';
    public static $METHOD_PUT = 'PUT';
    public static $METHOD_DELETE = 'DELETE';
    public static $METHOD_GET = 'GET';

    protected $url;
    protected $results;
    protected $params=[];
    protected $methods='POST';

    public function init($url){
        $this->url = $url;
    }


    /**
     * @param mixed $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }
    /**
     * @param mixed $methods
     */
    public function setMethods($methods)
    {
        $this->methods = $methods;
    }


    public function getRequestWithCurlUrlDecode(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
                'Content-Length: ' . strlen($this->params)
            )
        );
        $this->results = curl_exec($ch);
        curl_close($ch);
    }


    public function getRequestWithCurl(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                'Content-Length: ' . strlen($this->params)
            )
        );
        $this->results = curl_exec($ch);
        curl_close($ch);
    }

    public function getRequestWithFileGetContent(){
        $this->params = http_build_query($this->params);
        $opts = array(
         'http'=>array(
             'method'=>ApiRequestMethods::$METHOD_GET,
             'header'=>"Content-type: application/x-www-form-urlencoded\r\n".
                 "Content-length:".strlen($this->params)."\r\n" .
                 "Cookie: foo=bar\r\n" .
                 "\r\n",
             'content' => $this->params,
         )
        );
        $connection = stream_context_create($opts);
        $this->results = file_get_contents($this->url, false, $connection);
   }

    public function getRequestByCurlWithGet(){
        //初始化一个 cURL 对象
        $ch  = curl_init();
        //设置你需要抓取的URL
        curl_setopt($ch, CURLOPT_URL, $this->url);
        // 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //是否获得跳转后的页面
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $data = curl_exec($ch);
        curl_close($ch);
        echo $data;
    }

    /**
     * @return mixed
     * processing results as a map or array
     */
    public function getResults()
    {
        return $this->results;
    }



    public function getRequestWithCurlAndAuth(){

        $arr_header[] = "Content-Type:application/json";
        $arr_header[] = "Authorization: Digest ".'username="ClelyOZMGR5pyOIG",realm="edpauto",
        password="3Ygg7JbMgktA0m4fow1RuVPHXtLGkmrf"'; //添加头，在name和pass处填写对应账号密码

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if(!empty($arr_header)){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $arr_header);
        }
        $this->results = curl_exec($ch);
        curl_close($ch);
        return json_decode($this->results);

    }
}