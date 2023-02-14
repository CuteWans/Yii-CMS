<?php
/*
 * @Description: 奴才驾到CMS 
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:53:57
 */

use yii\helpers\Url;

/**
 * @var $model common\models\Article
 * @var $contentModel common\models\Article
 * @var $categories []string
 */
$this->params['breadcrumbs'] = [
    ['label' => Yii::t('app', 'Articles'), 'url' => Url::to(['index'])],
    ['label' => Yii::t('app', 'Create') . Yii::t('app', 'Articles')],
];
?>
<?= $this->render('_form', [
    'model' => $model,
    'contentModel' => $contentModel,
    'categories' => $categories,
]);
