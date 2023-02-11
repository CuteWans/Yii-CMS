<?php

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\Member */

$this->params['breadcrumbs'] = [
    ['label' => yii::t('app', 'Member'), 'url' => Url::to(['index'])],
    ['label' => yii::t('app', 'Create') . yii::t('app', 'Member')],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>

