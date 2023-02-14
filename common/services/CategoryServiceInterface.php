<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:05:46
 */
 

namespace common\services;


interface CategoryServiceInterface extends ServiceInterface
{
    const ServiceName = "categoryService";

    public function getCategoryList();

    public function getLevelCategoriesWithPrefixLevelCharacters();

    public function getCategoriesRelativeUrl();
}