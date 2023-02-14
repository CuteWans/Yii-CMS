<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:08:18
 */
 

namespace frontend\assets;

class ViewAsset extends \yii\web\AssetBundle
{
    public $css = [
        'static/syntaxhighlighter/styles/shCoreDefault.css'
    ];

    public $js = [
        'static/syntaxhighlighter/scripts/shCore.js',
        'static/syntaxhighlighter/scripts/shBrushJScript.js',
        'static/syntaxhighlighter/scripts/shBrushPython.js',
        'static/syntaxhighlighter/scripts/shBrushPhp.js',
        'static/syntaxhighlighter/scripts/shBrushJava.js',
        'static/syntaxhighlighter/scripts/shBrushCss.js',
    ];

    public $depends = [
        'frontend\assets\AppAsset'
    ];
}