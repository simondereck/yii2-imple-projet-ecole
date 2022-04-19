<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 03/01/2019
 * Time: 19:10
 */

namespace common\models;


class LocalDataArray
{
    public static function getGender(){
        return [
            0=>'',
            1=>'男',
            2=>'女'
        ];
    }


    public static function getIdcardtype(){
        return [
                0=>'',
                1 =>'Visa',
                2=>'RCPC',
                3=>'长居卡'
        ];
    }
    
    public static function getEducation(){
        return [
            0 => "",
            1 => "小学",
            2 => "初中",
            3 => "高中",
            4 => "大学",
            5 => "研究生",
            6 => "博士及以上"
        ];
    }

    public static function getDriverType(){
        return [
          0 => '',
          1 => '',
          2 => 'VTC司机'
        ];
    }


    public static function getDriverBaseStatus(){
        return [
            0=>'等待审核',
            1=>'审核通过',
            2=>'头像不符',
            3=>'证件过期',
            4=>'资料不符',
            5=>'照片不清晰'
        ];
    }


    public static function getDriverStatus(){
        return [
            0=>'等待审核',
            1=>'审核通过',
            2=>'锁定'
        ];
    }



    public static function getDriverDocumentStatus(){
        return [
            0=>'等待审核',
            1=>'审核通过',
            2=>'证件过期',
            3=>'证件不符',
            4=>'照片不清晰'
        ];
    }


    public static function getCarSeatsType(){
        return [
            0 => '五座',
            1 => '八座',
            2 => '九座',
        ];
    }


    public static function getCarColor(){
        return [
            "红色",
            "黑色",
            "蓝色",
            "黄色",
            "绿色",
            "白色",
            "银色",
            "香槟色",
        ];
    }


    public static function getCarInfoStatus(){
        return [
            0=>"等待审核",
            1=>"审核通过",
            2=>"证件不符",
            3=>"证件过期"
        ];
    }


    public static function getCarTypeStatus(){
        return [
            0=>"下架",
            1=>"上架",
            2=>"推荐",
        ];
    }


    public static function getOrderStatus(){
        return [
            0=>'未付款',
            1=>'已付款',
            2=>'司机接单',
            4=>'结束'
        ];
    }


    public static function getOrderType(){
        return [
            1=>"按天包车",
            2=>"按次包车",
            3=>"接送机"
        ];
    }
}