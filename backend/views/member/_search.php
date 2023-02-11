<?php

use yii\helpers\Html;
use backend\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\MemberSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-search ibox-heading row search" style="margin-top: 5px;padding-top:5px">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'member_uid', ['labelOptions'=>['class'=>'col-sm-4 control-label'], 'size'=>8, 'options'=>['class'=>'col-sm-3']]) ?>

    <?= $form->field($model, 'member_name', ['labelOptions'=>['class'=>'col-sm-4 control-label'], 'size'=>8, 'options'=>['class'=>'col-sm-3']]) ?>

    <?= $form->field($model, 'member_sex', ['labelOptions'=>['class'=>'col-sm-4 control-label'], 'size'=>8, 'options'=>['class'=>'col-sm-3']]) ?>

    <?= $form->field($model, 'member_age', ['labelOptions'=>['class'=>'col-sm-4 control-label'], 'size'=>8, 'options'=>['class'=>'col-sm-3']]) ?>

    <?= $form->field($model, 'member_number', ['labelOptions'=>['class'=>'col-sm-4 control-label'], 'size'=>8, 'options'=>['class'=>'col-sm-3']]) ?>

    <?php // echo $form->field($model, 'member_major', ['labelOptions'=>['class'=>'col-sm-4 control-label'], 'size'=>8, 'options'=>['class'=>'col-sm-3']]) ?>

    <?php // echo $form->field($model, 'member_intro', ['labelOptions'=>['class'=>'col-sm-4 control-label'], 'size'=>8, 'options'=>['class'=>'col-sm-3']]) ?>

    <div class="col-sm-3">
        <div class="col-sm-6">
            <?= Html::submitButton(Yii::t("app", Yii::t('app', 'Search')), ['class' => 'btn btn-primary btn-block']) ?>
        </div>
        <div class="col-sm-6">
            <?= Html::a(Yii::t("app", Yii::t('app', 'Reset')), Url::to(['index']), ['class' => 'btn btn-default btn-block']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
