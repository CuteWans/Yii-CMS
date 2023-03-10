<?php
 /*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:52:07
 */

use common\libs\Constants;
use yii\widgets\DetailView;

/**
 * @var $model common\models\Article
 */
?>
<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        [
            'attribute' => 'category',
            'value' => function($model){
                return $model->category === null ? "-" : $model->category->name;
            }
        ],
        'title',
        'sub_title',
        'summary',
        [
            'attribute' => 'thumb',
            'format' => 'raw',
            'value' => function($model){
                return "<img style='max-width:200px;max-height:200px' src='" . $model->thumb . "' >";
            }
        ],
        'seo_title',
        'seo_keywords',
        'seo_description',
        [
            'attribute' => 'status',
            'value' => function($model){
                return Constants::getStatusItems($model->status);
            }
        ],
        'sort',
        'template',
        'author_id',
        'author_name',
        'scan_count',
        'comment_count',
        [
            'attribute' => 'can_comment',
            'value' => function($model){
                return Constants::getYesNoItems($model->can_comment);
            }
        ],
        [
            'attribute' => 'visibility',
            'value' => function($model){
                return Constants::getArticleVisibility($model->visibility);
            }
        ],
        'password',
        [
            'attribute' => 'flag_headline',
            'value' => function($model){
                return Constants::getYesNoItems($model->flag_headline);
            }
        ],
        [
            'attribute' => 'flag_recommend',
            'value' => function($model){
                return Constants::getYesNoItems($model->flag_recommend);
            }
        ],
        [
            'attribute' => 'flag_slide_show',
            'value' => function($model){
                return Constants::getYesNoItems($model->flag_slide_show);
            }
        ],
        [
            'attribute' => 'flag_special_recommend',
            'value' => function($model){
                return Constants::getYesNoItems($model->flag_special_recommend);
            }
        ],
        [
            'attribute' => 'flag_roll',
            'value' => function($model){
                return Constants::getYesNoItems($model->flag_roll);
            }
        ],
        [
            'attribute' => 'flag_bold',
            'value' => function($model){
                return Constants::getYesNoItems($model->flag_bold);
            }
        ],
        [
            'attribute' => 'flag_picture',
            'value' => function($model){
                return Constants::getYesNoItems($model->flag_picture);
            }
        ],
        [
            'format' => 'raw',
            'attribute' => 'content',
            'value' => function($model){
                /** @var \common\models\Article $model */
                return $model->articleContent->content;
            }
        ],
        'created_at:datetime',
        'updated_at:datetime',
    ],
]) ?>