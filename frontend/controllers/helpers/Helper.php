<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:08:36
 */
 

namespace frontend\controllers\helpers;

use Yii;
use common\services\AdServiceInterface;
use common\services\ArticleServiceInterface;
use common\services\BannerServiceInterface;


class Helper
{
    public static function getCommonInfos()
    {
        /** @var ArticleServiceInterface $articleService */
        $articleService = Yii::$app->get(ArticleServiceInterface::ServiceName);
        /** @var BannerServiceInterface $bannerService */
        $bannerService = Yii::$app->get(BannerServiceInterface::ServiceName);
        /** @var AdServiceInterface $adService */
        $adService = Yii::$app->get(AdServiceInterface::ServiceName);

        $headLineArticles = $articleService->getFlagHeadLinesArticles(4);
        $indexBanners = $bannerService->getBannersByAdType("index");
        $rightAd1 = $adService->getAdByName("sidebar_right_1");
        $rightAd2 = $adService->getAdByName("sidebar_right_2");
        return [
            'headLinesArticles' => $headLineArticles,
            "indexBanners" => $indexBanners,
            "rightAd1" => $rightAd1,
            "rightAd2" => $rightAd2,
        ];
    }
}