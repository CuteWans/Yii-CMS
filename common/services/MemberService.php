<?php
namespace common\services;
/**
* This is the template for generating CRUD service class of the specified model.
*/

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
