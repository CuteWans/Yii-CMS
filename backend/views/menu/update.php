<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:57:57
 */

use yii\helpers\Url;

$this->params['breadcrumbs'] = [
    ['label' => Yii::t('app', 'Backend Menus'), 'url' => Url::to(['index'])],
    ['label' => Yii::t('app', 'Update') . Yii::t('app', 'Backend Menus')],
];

/**
 * @var $model backend\models\Menu
 * @var $parentMenuDisabledOptions []
 * @var $menusNameWithPrefixLevelCharacters []
 */
?>
<?= $this->render('_form', [
    'model' => $model,
    'menusNameWithPrefixLevelCharacters' => $menusNameWithPrefixLevelCharacters,
    'parentMenuDisabledOptions' => $parentMenuDisabledOptions,
]) ?>