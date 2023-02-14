<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:49:59
 */
 
namespace backend\models\search;


interface SearchInterface
{
    public function search(array $params = [], array $options = []);
}