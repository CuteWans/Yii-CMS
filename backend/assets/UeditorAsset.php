<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 10:00:20
 */
 

namespace backend\assets;


/**
 * 重要提示：启用配置后，修改此处的js/css将不会生效
 * 需要在backend/config/main.php中assetManager.bundles处修改配置
 * 主要用于测试环境走本地文件,正式环境配置成cdn
 * Class UeditorAsset
 * @package backend\assets
 */
class UeditorAsset extends \yii\web\AssetBundle
{

    public $basePath = "@web";

    public $sourcePath = '@backend/web/static/js/plugins/ueditor/';

    public $js = [
        'ueditor.all.min.js',
    ];

    public $publishOptions = [
        'except' => [
            'php/',
            'index.html',
            '.gitignore'
        ]
    ];

}
