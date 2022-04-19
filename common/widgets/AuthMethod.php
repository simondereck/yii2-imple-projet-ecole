<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 04/04/2019
 * Time: 18:01
 */

namespace common\widgets;

class AuthMethod
{

    private static $token="vtc37";
    public static $appsecret = "6d9f4e171ad78d1e86678ec29449252a";
    private static $encodingAesKey="DyEhM2ExXoOmJsksYGfozHQmOdUdXbADG1XYZBX2hp7";
    public static $appId="wxef6d54c5ad5bd56d";


    public static function get_access_token($appId = '', $appSecret = ''){
        //before request the token form wechat server then find token form local server and verify is vaild or not
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appId&secret=$appSecret";
        $result = file_get_contents($url);
        $result = json_decode($result,true);
        if (isset($result['access_token'])&&!empty($result['access_token'])){
            //save token and expires_in;
            //save expires_in TODO
            return $result['access_token'];
        }else{
            return null;
        }

    }

    /**{
            "touser": "OPENID",
            "template_id": "TEMPLATE_ID",
            "page": "index",
            "form_id": "FORMID",
            "data": {
            "keyword1": {
            "value": "339208499"
            },
            "keyword2": {
            "value": "2015年01月05日 12:30"
            },
            "keyword3": {
            "value": "腾讯微信总部"
            },
            "keyword4": {
            "value": "广州市海珠区新港中路397号"
            }
            },
            "emphasis_keyword": "keyword1.DATA"
        }
     **/


//        司机姓名
//        {{keyword1.DATA}}
//
//        车牌号
//        {{keyword2.DATA}}
//
//        联系电话
//        {{keyword3.DATA}}
//
//        出发时间
//        {{keyword4.DATA}}
//
//        行程信息
//        {{keyword5.DATA}}

    const ORDER_PAY_FAIL = 1;
    const ORDER_PAY_SUCCESS = 2;
    const ORDER_DRIVER_TAKE_ORDER = 3;



    public static function sendOrderMessage($message,$type=AuthMethod::ORDER_PAY_SUCCESS){

        switch ($type){
            case AuthMethod::ORDER_DRIVER_TAKE_ORDER:
                $message["template_id"] = "KBJNuUh9bg9zR3fNN9jCslxanEwo9ZzZvG8vmhugbvA";
                $message["page"] = "/pages/order/detail?orid=".$message["orid"];
                unset($message["orid"]);
                break;
            case AuthMethod::ORDER_PAY_FAIL:
//                $message[""]

                break;
            case AuthMethod::ORDER_PAY_SUCCESS:
                $message["template_id"] = "Yb9BfddeF6oPIBNXxVZvJrb0Whk7B9T2a5yqBgFpahk";
                $message["page"] = "/pages/order/detail?orid=".$message["data"]["keyword1"]["value"];
                break;
        }
        $token = self::get_access_token(self::$appId,self::$appsecret);
        $url = "https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send?access_token=".$token;
        //以'json'格式发送post的https请求
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($message)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($message));
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($curl, CURLOPT_HTTPHEADER, $headers );
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }



}