<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:05:58
 */
 

namespace common\services;


interface CommentServiceInterface extends ServiceInterface
{
    const ServiceName = "commentService";

    public function getRecentComments($limit = 10);

    public function getCommentCountByPeriod($startAt=null, $endAt=null);
}