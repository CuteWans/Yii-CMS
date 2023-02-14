<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:08:12
 */
 

namespace frontend\assets;


class IndexAsset extends \yii\web\AssetBundle
{
    public $js = [
        'static/js/jquery.min.js',
        'static/js/responsiveslides.min.js',
    ];

    public $depends = [
        'frontend\assets\AppAsset',
    ];
}