<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:58:56
 */
 

use common\libs\Constants;
use yii\widgets\DetailView;

/** @var $model backend\models\Menu */
?>
<?=DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'parent_id',
        [
            'label' => Yii::t('app', 'Parent Menu Name'),
            'attribute' => 'parent_id',
            'value' => function($model){
                return $model->parent === null ? '' : $model->parent->name;
            }
        ],
        'name',
        'url',
        [
            'attribute' => 'icon',
            'format' => 'raw',
            'value' => function($model){
                if( empty($model->icon) ) return '';
                return "<i class='" . $model->icon . "'></i>";
            }
        ],
        'sort',
        [
            'attribute' => 'is_absolute_url',
            'value' => function($model){
                return Constants::getYesNoItems($model->is_absolute_url);
            }
        ],
        [
            'attribute' => 'target',
            'value' => function($model){
                return Constants::getTargetOpenMethod($model->target);
            }
        ],
        [
            'attribute' => 'is_display',
            'value' => function($model){
                return Constants::getYesNoItems($model->is_display);
            }
        ],
        'created_at:datetime',
        'updated_at:datetime',
    ],
])
?>