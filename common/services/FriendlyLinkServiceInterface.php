<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:06:11
 */
 

namespace common\services;


interface FriendlyLinkServiceInterface extends ServiceInterface {
    const ServiceName = "friendlyLinkService";

    public function getFriendlyLinks();

    public function getFriendlyLinkCountByPeriod($startAt=null, $endAt=null);
}