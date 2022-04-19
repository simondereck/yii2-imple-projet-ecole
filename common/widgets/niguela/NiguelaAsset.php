<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 12/05/2019
 * Time: 01:12
 */

namespace common\widgets\niguela;
use yii\web\AssetBundle;


class NiguelaAsset extends AssetBundle{
    public $js = [
        'Niguela.js',
    ];


    public $css = [
        'Niguela.css'
    ];

    public function init()
    {
        $this->sourcePath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets';
    }
}



