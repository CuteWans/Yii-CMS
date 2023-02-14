<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:57:50
 */
 
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Member */

$this->params['breadcrumbs'] = [
    ['label' => yii::t('app', 'Member'), 'url' => Url::to(['index'])],
    ['label' => yii::t('app', 'Update') . yii::t('app', 'Member')],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
