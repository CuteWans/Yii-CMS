<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:55:10
 */
 

use yii\helpers\Url;

/**
 * @var $categories []
 */

$this->params['breadcrumbs'] = [
    ['label' => Yii::t('app', 'Category'), 'url' => Url::to(['index'])],
    ['label' => Yii::t('app', 'Create') . Yii::t('app', 'Category')],
];
/**
 * @var $model common\models\Category
 */
?>
<?= $this->render('_form', [
    'model' => $model,
    'categories' => $categories,
]); ?>