<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 10:00:09
 */
 

namespace backend\assets;


/**
 * 重要提示：启用配置后，修改此处的js/css将不会生效
 * 需要在backend/config/main.php中assetManager.bundles处修改配置
 * 主要用于测试环境走本地文件,正式环境配置成cdn
 *
 * Class IndexAsset
 * @package backend\assets
 */
class IndexAsset extends \yii\web\AssetBundle
{

    public $css = [
        'static/css/bootstrap.min.css',
        'static/css/font-awesome.min93e3.css?v=4.4.0',
        'static/css/style.min862f.css?v=4.1.0',
    ];

    public $js = [
        "static/js/jquery.min.js?v=2.1.4",
        "static/js/bootstrap.min.js?v=3.3.6",
        "static/js/plugins/metisMenu/jquery.metisMenu.js",
        "static/js/plugins/slimscroll/jquery.slimscroll.min.js",
        "static/js/plugins/layer/layer.min.js",
        "static/js/hplus.min.js?v=4.1.0",
        "static/js/contabs.min.js",
        "static/js/plugins/pace/pace.min.js",
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
