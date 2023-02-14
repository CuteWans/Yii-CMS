<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:08:07
 */
 

namespace frontend\assets;

class AppAsset extends \yii\web\AssetBundle
{

    public $css = [
        'static/css/style.css',
        'static/plugins/toastr/toastr.min.css',
    ];

    public $js = [
        'static/js/index.js',
        'static/plugins/toastr/toastr.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];

}
