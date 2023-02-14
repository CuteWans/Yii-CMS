<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:56:49
 */
 

use common\libs\Constants;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FriendlyLink */
?>
<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'name',
        [
            'attribute' => 'image',
            'format' => 'raw',
            'value' => function($model){
                if( empty( $model->image ) ) return '-';
                return "<img style='max-width:100px;max-height:100px' src='" . $model->image . "'>";
            }
        ],
        'url',
        [
            'attribute' => 'target',
            'value' => function($model){
                return Constants::getTargetOpenMethod($model->target);
            }
        ],
        'sort',
        [
            'attribute' => 'status',
            'value' => function($model){
                return Constants::getStatusItems($model->status);
            }
        ],
        'created_at:datetime',
        'updated_at:datetime',
    ],
]) ?>