<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-06-21 14:26
 */

/**
 * @var $rightAd1 \backend\models\form\AdForm
 * @var $rightAd2 \backend\models\form\AdForm
 */

use frontend\widgets\FriendlyLinkView;
use frontend\widgets\HottestArticleTagView;
use frontend\widgets\LatestCommentView;
use frontend\widgets\RecentCommentArticleView;
use frontend\widgets\SNSView;

?>
<aside class="sidebar">
    <div class="widget d_comment">
        <div class="title">
            <h2>
                <sapn class="title_span"><?= Yii::t('frontend', 'Latest Comments') ?></sapn>
            </h2>
        </div>
       <?=LatestCommentView::widget()?>
    </div>
    <div class="widget widget_text">
        <div class="title">
            <h2>
                <sapn class="title_span"><?= Yii::t('frontend', 'Friendly Links') ?></sapn>
            </h2>
        </div>
        <div class="textwidget">
            <div class="d_tags_1">
                <?=FriendlyLinkView::widget()?>
            </div>
        </div>
    </div>
</aside>
