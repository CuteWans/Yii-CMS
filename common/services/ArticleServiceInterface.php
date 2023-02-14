<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:05:32
 */
 

namespace common\services;


use common\models\ArticleContent;

interface ArticleServiceInterface extends ServiceInterface
{
    const ServiceName = 'articleService';

    const ScenarioArticle = "article";

    const ScenarioPage = "page";


    public function newArticleContentModel(array $options= []);

    public function getArticleContentDetail($id, array $options = []);

    public function getFlagHeadLinesArticles($limit, $sort = SORT_DESC);

    public function getArticleSubTitle($subTitle);

    public function getArticleById($aid);

    public function getArticlesCountByPeriod($startAt=null, $endAt=null);

    public  function getFrontendURLManager();

    public function getSinglePages();
}