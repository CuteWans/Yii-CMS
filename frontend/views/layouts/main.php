<?php
 /*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:11:15
 */

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;
use frontend\widgets\MenuView;

AppAsset::register($this);
$this->title = '奴才驾到 CMS';

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php !isset($this->metaTags['keywords']) && $this->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->feehi->seo_keywords], 'keywords');?>
    <?php !isset($this->metaTags['description']) && $this->registerMetaTag(['name' => 'description', 'content' => Yii::$app->feehi->seo_description], 'description');?>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <script>
        window._deel = {
            name: '<?=Yii::$app->feehi->website_title?>',
            url: '<?=Yii::$app->getHomeUrl()?>',
            comment_url: '<?=Url::to(['article/comment'])?>',
            ajaxpager: '',
            commenton: 0,
            roll: [4,]
        }
    </script>
</head>
<?php $this->beginBody() ?>
<body class="home blog">
<?= $this->render('_flash') ?>
<header id="masthead" class="site-header">
    <nav id="top-header">
        <div class="top-nav">
            <div id="user-profile">
                <span class="nav-set">
                    <span class="nav-login">
                        <?php
                        if (Yii::$app->getUser()->getIsGuest()) {
                            ?>
                            <a href="<?= Url::to(['site/login']) ?>" class="signin-loader"><?= Yii::t('frontend', 'Hi, Log in') ?></a>&nbsp; &nbsp;
                            <a href="<?= Url::to(['site/signup']) ?>" class="signup-loader"><?= Yii::t('frontend', 'Sign up') ?></a>
                        <?php } else { ?>
                            <?=Yii::t("frontend", "Welcome")?>, <?= Html::encode(Yii::$app->user->identity->username) ?>
                            <a href="<?= Url::to(['site/logout']) ?>" class="signup-loader"><?= Yii::t('frontend', 'Log out') ?></a>
                        <?php } ?>
                    </span>
                </span>
            </div>
        </div>
    </nav>
    <div id="nav-header" class="">
        <div id="top-menu">
            <div id="top-menu_1">
                <span class="nav-search"><i class="fa fa-search"></i></span>
                <span class="nav-search_1"><i class="fa fa-navicon"></i></span>
                <hgroup class="logo-site" style="margin-top: 10px;">
                    <h1 class="site-title">
                        <a href="<?= Yii::$app->getHomeUrl() ?>"><img src="<?=Yii::$app->getRequest()->getBaseUrl()?>/static/images/logo.png" width=60px></a>
                    </h1>
                </hgroup>
                <div id="site-nav-wrap">
                    <nav id="site-nav" class="main-nav">
                        <div>
                            <?= MenuView::widget() ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <?= MenuView::widget([
        'template' => '<nav><ul class="nav_sj" id="nav-search_1">{lis}</ul></nav>',
        'liTemplate' => "<li class='menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-{menu_id}'><a href='{url}'>{title}</a>{sub_menu}</li>"
    ]) ?>
</header>

<div id="search-main">
    <div class="searchbar">
        <form class="searchform" action="<?= Url::toRoute('search/index') ?>" method="get">
            <?= Yii::$app->getUrlManager()->enablePrettyUrl ? "" : "<input type='hidden' name='" . Yii::$app->getUrlManager()->routeParam . "' value='search/index'>" ?>
            <input type="text" name="q" value="<?= Html::encode(Yii::$app->getRequest()->get('q')) ?>" required="" placeholder="<?= Yii::t('frontend', 'Please input keywords') ?>">
            <button class="searchsubmit" type="submit"><?= Yii::t('frontend', 'Search') ?></button>
        </form>
    </div>
    <div class="searchbar">
        <form class="searchform" target="_blank" action="https://www.baidu.com/s" method="get">
            <input type="hidden" name="entry" value="1">
            <input class="swap_value" name="w" placeholder="<?= Yii::t('frontend', 'Please input keywords') ?>">
            <button class="searchsubmit" type="submit"><?= Yii::t('frontend', 'Baidu') ?></button>
        </form>
    </div>
    <div class="clear"></div>
</div>

<section class="container">
    <div class="speedbar"></div>
    <?= $content ?>
</section>

<footer class="footer">
    <div class="footer-inner">
        <p>
            <a href="<?= Yii::$app->getHomeUrl() ?>" title="奴才驾到 CMS">奴才驾到 CMS</a> <?= Yii::t('frontend', 'Copyright, all rights reserved') ?> © <?=date('Y')?>&nbsp;&nbsp;
            <select onchange="location.href=this.options[this.selectedIndex].value;" style="height: 30px">
                <?php
                foreach (Yii::$app->params['supportLanguages'] as $language => $languageDescription){
                    $selected = "";
                    if (Yii::$app->language == $language){
                        $selected = "selected";
                    }
                    $url = Url::to(['site/language', 'lang' => $language]);
                    echo "<option $selected value='{$url}'>{$languageDescription}</option>";
                }
                ?>
            </select>
        </p>
        <p><?=Yii::$app->feehi->website_icp?> Powered by Our CMS <a title="奴才驾到" target="_blank" href="<?= Yii::$app->getHomeUrl() ?>">奴才驾到</a></p>
    </div>
</footer>

<div class="rollto" style="display: none;">
    <button class="btn btn-inverse" data-type="totop" title="back to top"><i class="fa fa-arrow-up"></i></button>
</div>

</body>
<?php $this->endBody() ?>
<?php
if (Yii::$app->feehi->website_statics_script) {
    echo Yii::$app->feehi->website_statics_script;
}
?>
</html>
<?php $this->endPage() ?>