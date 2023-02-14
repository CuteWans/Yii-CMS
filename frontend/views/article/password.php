<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:11:15
 */
 

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $article common\models\Article */
/* @var $model frontend\models\form\ArticlePasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', $article->title);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrap">
    <div class="fill">
        <h5><?= Yii::t('frontend', 'Please input the password of article id {id} : {article}', ['article'=>$article->title, 'id'=>$article->id]) ?></h5>

        <div class="marginTop">
            <ul class="formInput">
                <?php $form = ActiveForm::begin(['id' => 'form-login']); ?>

                <?= $form->field($model, 'password', ['template' => "<li class='item'>{label}{input}\n{error}\n{hint}</li>"])->textInput(['autofocus' => true]) ?>

                <div class="submitButton">
                    <?= Html::submitButton(Yii::t('frontend', 'Go'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </ul>
        </div>
    </div>
</div>
