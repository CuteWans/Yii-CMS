<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:10:56
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
