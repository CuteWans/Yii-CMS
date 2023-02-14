<?php
 /*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:52:07
 */

/**
 * @var $this yii\web\View
 * @var $model common\models\Comment
 */

use backend\widgets\ActiveForm;
use common\libs\Constants;

$this->title = "Comments";
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <?=$this->render('/widgets/_ibox-title')?>
            <div class="ibox-content">
                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'nickname') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'content')->textarea() ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'website_url') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'ip') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'status')->radioList(Constants::getCommentStatusItems()) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->defaultButtons() ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>