<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:12:47
 */
 

/**
 * @var $this yii\web\View
 * @var $singlePages []common\models\Article
 */

use yii\helpers\Url;

$this->title = $model->title . '-' . Yii::$app->feehi->website_title;
?>

<?=$this->render("../article/_register_meta_tags", ['model' => $model])?>

<div class="pagewrapper clearfix">
    <aside class="pagesidebar">
        <ul class="pagesider-menu">
            <?php

            foreach ($singlePages as $singlePage) {
                $url = Url::to(['page/view', 'name'=>$singlePage['sub_title']]);
                $current = '';
                if (Yii::$app->request->get('id', '') == $singlePage->id) {
                    $current = " current-menu-item current-page-item ";
                }
                echo "<li class='menu-item menu-item-type-post_type menu-item-object-page {$current} page_item page-item-{$singlePage->id} menu-item-{$singlePage->id}'><a href='{$url}'>{$singlePage->title}</a></li>";
            }
            ?>
        </ul>
    </aside>
    <div class="pagecontent">
        <header class="pageheader clearfix">
            <h1 class="pull-left">
                <?= $model->title ?>
            </h1>
            <div class="pull-right">
            </div>
        </header>
        <div class="article-content">
            <?= $model->articleContent->content ?>
        </div>
    </div>
</div>
