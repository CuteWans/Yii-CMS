<?php

use backend\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Member */
/* @var $form backend\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?php $form = ActiveForm::begin([
                    'options' => [
                        'class' => 'form-horizontal'
                    ]
                ]); ?>
                <div class="hr-line-dashed"></div>
                    <?= $form->field($model, 'member_name')->textarea(['rows' => 6]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'member_sex')->textarea(['rows' => 6]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'member_age')->textInput() ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'member_number')->textInput() ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'member_major')->textarea(['rows' => 6]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'member_intro')->textarea(['rows' => 6]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->defaultButtons() ?>
                    <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>