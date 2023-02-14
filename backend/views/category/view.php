<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:55:28
 */
 

use yii\widgets\DetailView;

/** @var $model common\models\Category */
?>
<?=DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'parent_id',
        [
            'label' => Yii::t('app', 'Parent Category Name'),
            'attribute' => 'parent_id',
            'value' => function($model){
                return $model->parent === null ? '' : $model->parent->name;
            }
        ],
        'name',
        'alias',
        'sort',
        'template',
        'article_template',
        'remark',
        'created_at:datetime',
        'updated_at:datetime',
    ],
])?>
