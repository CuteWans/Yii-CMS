<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:06:47
 */
 

namespace common\services;


use common\models\Menu;

interface MenuServiceInterface extends ServiceInterface {

    const ServiceName = 'menuService';

    public function getLevelMenusWithPrefixLevelCharacters($menuType = Menu::TYPE_BACKEND);
}