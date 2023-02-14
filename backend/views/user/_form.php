<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:59:33
 */
 

/**
 * @var $this yii\web\View
 * @var $model common\models\User
 */
use backend\widgets\ActiveForm;
use common\models\User;

$this->title = 'User';
?>
<div class="col-sm-12">
    <div class="ibox">
        <?= $this->render('/widgets/_ibox-title') ?>
        <div class="ibox-content">

            <?php $form = ActiveForm::begin([
                'options' => [
                    'enctype' => 'multipart/form-data',
                    'class' => 'form-horizontal'
                ]
            ]); ?>
            <?php
            $temp = ['maxlength' => 64];
            if (Yii::$app->controller->action->id == 'update') {
                $temp['disabled'] = 'disabled';
            }
            ?>
            <?= $form->field($model, 'username')->textInput($temp) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'avatar')->imgInput() ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'email')->textInput(['maxlength' => 64]) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'status')->radioList( User::getStatuses() ) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'password')->textInput(['maxlength' => 512]) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'repassword')->textInput(['maxlength' => 512]) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->defaultButtons() ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
