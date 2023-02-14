<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:56:07
 */
 

use common\libs\Constants;
use yii\widgets\DetailView;

/** @var $model common\models\Comment */
?>
<?=DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'aid',
        [
            'label' => Yii::t('app', 'Article Title'),
            'attribute' => 'aid',
            'value' => function($model){
                return $model->article->title;
            }
        ],
        'uid',
        'admin_id',
        'reply_to',
        'nickname',
        'email',
        'website_url',
        'content',
        'ip',
        [
            'attribute' => 'status',
            'value' => function($model){
                return Constants::getCommentStatusItems($model->status);
            }
        ],
        'created_at:datetime',
        'updated_at:datetime',
    ]
])?>
