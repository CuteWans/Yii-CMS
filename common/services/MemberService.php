<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 19:06:37
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:06:21
 */
namespace common\services;
 

use backend\models\search\MemberSearch;
use common\models\Member;

class MemberService extends Service implements MemberServiceInterface{
    public function getSearchModel(array $query=[], array $options=[])
    {
         return new  MemberSearch();
    }

    public function getModel($id, array $options = [])
    {
        return Member::findOne($id);
    }

    public function newModel(array $options = [])
    {
        $model = new Member();
        $model->loadDefaultValues();
        return $model;
    }
}
