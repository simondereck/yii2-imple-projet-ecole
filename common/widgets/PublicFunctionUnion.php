<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018/1/12
 * Time: 下午8:19
 */

namespace common\widgets;
use stdClass;
use Yii;
use DateTime;

class PublicFunctionUnion
{
    static public function getTimeString(){
//        date_default_timezone_set('CET');
        return date_format(date_create(), 'Y-m-d H:i:s');
    }

    static public function getDateString(){
//        date_default_timezone_set('CET');
        return date_format(date_create(),"Y-m-d");
    }

    static public function getDateFrString(){
//        date_default_timezone_set('CET');
        return date_format(date_create(),"d/m/Y");
    }

    static public function setDateFlex($dateString){
        $date = strtotime($dateString);
        return date('Ym', $date);
    }

    static public function setDateCreate($dateString){
        $date = strtotime($dateString);
        return date('d/m/Y', $date);
    }

    static public function dateConvert($dateString){
        $date = strtotime($dateString);
        return date('Y-m-d', $date);
    }



    static public function dateConvertStart($dateString){
        $date = strtotime($dateString);
        return date("Y-m-d H:i:s",$date);
    }

    static public function dateConvertEnd($dateString){
        $date = strtotime($dateString) + 24*60*60 - 1;
        return date("Y-m-d H:i:s",$date);
    }

    static public function getDataStringSet(){
        return date_format(date_create(),"Ymd");
    }

    static public function getOrderId($uid){
        $date = new DateTime();
        $str =  $date->getTimestamp();
        return md5($str."37vtc".$uid);
    }

    static public function stringToDate($time){
        return date_format(date_create($time),"Y-m-d");
    }

    static public function stringToTime($data){
        return date_format(date_create($data),"Y-m-d H:i:s");
    }



    static public function checkIsPhoneNo($string){
        if(preg_match("/^[0-9]+$/", $string)){
            return true;
        }
        return false;
    }

    static public function sendSystemMessage($title,$message,$to){
        $mailer = Yii::$app->mailer;
        $mailer->useFileTransport  =  false;
        $mail= Yii::$app->mailer->compose("message",["title"=>$title,"message"=>$message]);
        $mail->setTo($to); //要发送给那个人的邮箱
        $mail->setSubject("乐城信息"); //邮件主题
//        $mail->setTextBody('测试text'); //发布纯文字文本
//        $mail->setHtmlBody("测试html text"); //发送的消息内容
        return $mail->send();
    }

    static public function sendContractMessage($title,$message,$contract,$to){
        $mailer = Yii::$app->mailer;
        $mailer->useFileTransport  =  false;
        $mail= Yii::$app->mailer->compose("contract",["title"=>$title,"message"=>$message,"contract"=>$contract]);
        $mail->setTo($to); //要发送给那个人的邮箱
        $mail->setSubject("合同信息"); //邮件主题
//        $mail->setTextBody('测试text'); //发布纯文字文本
//        $mail->setHtmlBody("测试html text"); //发送的消息内容
        return $mail->send();
    }

    static public function sendOrderMessage($title,$message,$order,$to){
        $mailer = Yii::$app->mailer;
        $mailer->useFileTransport  =  false;
        $mail= Yii::$app->mailer->compose("order",["title"=>$title,"message"=>$message,"order"=>$order]);
        $mail->setTo($to); //要发送给那个人的邮箱
        $mail->setSubject("合同信息"); //邮件主题
//        $mail->setTextBody('测试text'); //发布纯文字文本
//        $mail->setHtmlBody("测试html text"); //发送的消息内容
        return $mail->send();
    }


    static public function sendMulitEmails($users,$title,$context,$files){
        $messages = [];

        foreach ($users as $user) {
            $message = Yii::$app->mailer;
            $message->useFileTransport  =  false;
            $message = Yii::$app->mailer->compose()
                ->setTo(trim($user))
//                ->attachContent('Attachment content', ['fileName' => 'attach.txt', 'contentType' => 'text/plain'])
                ->setSubject($title)
                ->setHtmlBody($context);
            foreach ($files as $file){
                $message->attach($file);
            }
            $messages[] = $message;
//            $message->send();
        }
        Yii::$app->mailer->sendMultiple($messages);
    }

    static public function HttpPost(){
        $data = array ('keyword' => 'bar');

        $data = http_build_query($data);


        $opts = array (

            'http' => array (

                'method' => 'POST',

                'header'=> 'Content-type: application/x-www-form-urlencodedrn' .

                    'Content-Length: ' . strlen($data) . '\r\n',

                'content' => $data

            )

        );


        $context = stream_context_create($opts);

        $html = file_get_contents('http://www.baidu.com', false, $context);


        echo $html;
    }



    static function check_email_address($email) {
        $search = '/^([a-z0-9+_-]+)(.[a-z0-9+_-]+)*@([a-z0-9-]+.)+[a-z]{2,6}$/ix';
        if ( preg_match( $search, $email ) ) {
            return true;
        } else {
            return false;
        }
    }

    static function printData($data){
        echo "<pre>";
        var_dump($data);
        die;
    }

    static function saveToFile($data){
        $my_file = '../../backend/runtime/test.txt';
        $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
        fwrite($handle, json_encode($data));
    }


    static  function arrayCastRecursive($array)
    {
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                if (is_array($value)) {
                    $array[$key] = PublicFunctionUnion::arrayCastRecursive($value);
                }
                if ($value instanceof stdClass) {
                    $array[$key] = PublicFunctionUnion::arrayCastRecursive((array)$value);
                }
            }
        }
        if ($array instanceof stdClass) {
            return PublicFunctionUnion::arrayCastRecursive((array)$array);
        }
        return $array;
    }


    static  function generate_password( $length = 8 )
    {
        // 密码字符集，可任意添加你需要的字符
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*';

        $password = '';
        for ( $i = 0; $i < $length; $i++ ) {
            $password .= $chars[mt_rand(0, strlen($chars) - 1)];
        }

        return $password;
    }



    static public function getDatesBetweenTwoDays($startDate,$endDate){
        $dates = [];
        if(strtotime($startDate)>strtotime($endDate)){
            //如果开始日期大于结束日期，直接return 防止下面的循环出现死循环
            return $dates;
        }elseif($startDate == $endDate){
            //开始日期与结束日期是同一天时
            array_push($dates,$startDate);
            return $dates;
        }else{
            array_push($dates,$startDate);
            $currentDate = $startDate;
            do{
                $nextDate = date('Y-m-d', strtotime($currentDate.' +1 days'));
                array_push($dates,$nextDate);
                $currentDate = $nextDate;
            }while($endDate != $currentDate);
            return $dates;
        }
    }



}
