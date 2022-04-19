<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 11/05/2019
 * Time: 19:32
 */

namespace common\widgets\niguela;


use yii\helpers\Html;



class Niguela
{


    protected static function initHtml(){
        $content = static::initCanvas().static::initShowCanvas();
        $topArea = Html::tag("div",$content,['class'=>'neguela-cut-image']);
        return $topArea. static::initButtonGroup();
    }




    protected static function initButtonGroup(){

        $labels = ['图片移动:','图片缩放:','截屏大小:'];
        $items = [
            [
                ['class'=>'btn btn-warning btn-sm','id'=>'right','content'=>'right'],
                ['class'=>'btn btn-warning btn-sm','id'=>'left','content'=>'left'],
                ['class'=>'btn btn-danger btn-sm','id'=>'up','content'=>'up'],
                ['class'=>'btn btn-danger btn-sm','id'=>'down','content'=>'down']
            ],
            [
                ['class'=>'btn btn-success btn-sm','id'=>'pic-plus','content'=>'+'],
                ['class'=>'btn btn-default btn-sm','id'=>'pic-moins','content'=>'-'],
            ],
            [
                ['class'=>'btn btn-success btn-sm','id'=>'grand','content'=>'+'],
                ['class'=>'btn btn-default btn-sm','id'=>'min','content'=>'-'],
            ]

        ];

        $buttonItems = "";

        foreach($labels as $key=>$label){
            $content = Html::tag("label",$label,[]);
            foreach ($items[$key] as $item){
                $content .= Html::tag("span",$item["content"],$item);
            }
            $buttonItems .= Html::tag("div",$content,["class"=>"neguela-button-group-item"]);

        }

        return Html::tag("div",$buttonItems,['class'=>'neguela-button-group']);

    }


    protected static function initCanvas(){
        $imageShow = Html::tag("div",null,['id'=>'neguela-imageShow']);
        $bottomCanvas = Html::tag("canvas",null,['id'=>'neguela-bottom-canvas']);
        $topCanvas = Html::tag("canvas",null,['id'=>'neguela-top-canvas']);
        return Html::tag("div",$imageShow.$bottomCanvas.$topCanvas,["class"=>"neguela-img-content"]);
    }



    protected static function initShowCanvas(){
        $showCanvas = Html::tag("canvas",null,["id"=>"neguela-show-area"]);
        $span = Html::tag("span","剪裁图片",['class'=>'btn btn-success btn-sm','id'=>'cut']);
        return $showCanvas.Html::tag("div",$span,['class'=>'neguela-show-button-group']);
    }


    public static function cutImage($self)
    {
        NiguelaAsset::register($self);
        return static::initHtml();

    }




}