<?php
 /*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:52:07
 */
use yii\helpers\Html;
use backend\widgets\ActiveForm;
use yii\helpers\Url;
use common\libs\Constants;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ArticleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="test-search ibox-heading row search" style="margin-top: 5px;padding-top:5px">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'title', ['labelOptions'=>['class'=>'col-sm-4 control-label'], 'size'=>8, 'options'=>['class'=>'col-sm-3']]) ?>

    <?= $form->field($model, 'content', ['labelOptions'=>['class'=>'col-sm-4 control-label'], 'size'=>8, 'options'=>['class'=>'col-sm-3']])->label(Yii::t("app", "Content")) ?>

    <?= $form->field($model, 'sub_title', ['labelOptions'=>['class'=>'col-sm-4 control-label'], 'size'=>8, 'options'=>['class'=>'col-sm-3']]) ?>

    <?= $form->field($model, 'seo_keywords', ['labelOptions'=>['class'=>'col-sm-5 control-label'], 'size'=>7, 'options'=>['class'=>'col-sm-3']]) ?>

    <?= $form->field($model, 'visibility', ['labelOptions'=>['class'=>'col-sm-4 control-label'], 'size'=>8, 'options'=>['class'=>'col-sm-3']])->dropDownList(Constants::getYesNoItems()) ?>

    <?= $form->field($model, 'can_comment', ['labelOptions'=>['class'=>'col-sm-4 control-label'], 'size'=>8, 'options'=>['class'=>'col-sm-3']])->dropDownList(Constants::getYesNoItems()) ?>

    <?= $form->field($model, 'password', ['labelOptions'=>['class'=>'col-sm-4 control-label'], 'size'=>8, 'options'=>['class'=>'col-sm-3']])->dropDownList(Constants::getYesNoItems()) ?>

    <?= $form->field($model, 'summary', ['labelOptions'=>['class'=>'col-sm-4 control-label'], 'size'=>8, 'options'=>['class'=>'col-sm-3']]) ?>

    <?= $form->field($model, 'seo_title', ['labelOptions'=>['class'=>'col-sm-4 control-label'], 'size'=>8, 'options'=>['class'=>'col-sm-3']]) ?>

    <div class="col-sm-3">
        <div class="col-sm-6">
            <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary btn-block']) ?>
        </div>
        <div class="col-sm-6">
            <?= Html::a(Yii::t('app', 'Reset'), Url::to(['index']), ['class' => 'btn btn-default btn-block']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
