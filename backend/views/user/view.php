<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:59:57
 */
 

use common\models\User;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */
?>
<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'username',
        'email',
        [
            'attribute' => 'avatar',
            'format' => 'raw',
            'value' => function($model){
                if( empty( $model->avatar ) ) return '-';
                return "<img style='max-width:100px;max-height:100px' src='" . $model->avatar . "'>";
            }
        ],
        [
            'attribute' => 'status',
            'value' => function ($model) {
                if($model->status == User::STATUS_ACTIVE){
                    return Yii::t('app', 'Normal');
                }else if( $model->status == User::STATUS_DELETED ) {
                    return Yii::t('app', 'Disabled');
                }
            }
        ],
        'created_at:datetime',
        'updated_at:datetime',
    ],
]) ?>