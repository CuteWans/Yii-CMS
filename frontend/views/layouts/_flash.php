<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:11:41
 */
 

use common\widgets\JsBlock;

if (Yii::$app->getSession()->hasFlash('success')) {
    $successTitle = Yii::t('app', 'Success');
    $info = Yii::$app->getSession()->getFlash('success');
    $str = <<<EOF
       toastr.options = {
          "closeButton": true,
          "debug": true,
          "progressBar": true,
          "positionClass": "toast-top-center",
          "showDuration": "400",
          "hideDuration": "1000",
          "timeOut": "1000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
       };
       toastr.success("{$successTitle}", "{$info}");
EOF;
    JsBlock::begin();
    echo $str;
    JsBlock::end();
}
if (Yii::$app->getSession()->hasFlash('error')) {
    $errorTitle = Yii::t('app', 'Error');
    $info = Yii::$app->getSession()->getFlash('error');
    $str = <<<EOF
       toastr.options = {
          "closeButton": true,
          "debug": true,
          "progressBar": true,
          "positionClass": "toast-top-center",
          "showDuration": "400",
          "hideDuration": "1000",
          "timeOut": "1000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
       };
       toastr.error("{$errorTitle}", "{$info}");
EOF;
    JsBlock::begin();
    echo $str;
    JsBlock::end();
}
?>