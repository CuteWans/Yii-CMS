<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:12:55
 */
 

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="content-wrap">
    <div style="text-align:center;padding:10px 0;font-size:16px;background-color:#ffffff;height: 460px">
        <h2 style="font-size:36px;margin-bottom:10px;"><?= Html::encode($this->title) ?></h2>
        <p align="center"><?= nl2br(Html::encode($message)) ?></p>
        <div style="margin-top: 20px">
            <p>
                <?= Yii::t('frontend', 'The above error occurred while the Web server was processing your request.') ?>
            </p>
            <p>
                <?= Yii::t('frontend', 'Please contact us if you think this is a server error. Thank you.') ?>
            </p>
        </div>
    </div>
</div>