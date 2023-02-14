<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:07:09
 */
 

namespace common\services;


use backend\models\search\UserSearch;
use common\models\User;

class UserService extends Service implements UserServiceInterface
{

    public function getSearchModel(array $options = [])
    {
        return new UserSearch();
    }

    public function getModel($id, array $options = [])
    {
        $model = User::findOne($id);
        if( isset($options['scenario']) && !empty($options['scenario']) ){
            if($model !== null) {
                $model->setScenario($options['scenario']);
            }
        }
        return $model;
    }

    public function newModel(array $options = [])
    {
        $model = new User();
        $model->loadDefaultValues();
        isset($options['scenario']) && $model->setScenario($options['scenario']);
        return $model;
    }

    public function create(array $postData, array $options = [])
    {
        $model = $this->newModel($options);
        if( $model->load($postData) ){
            $model->generateAuthKey();
            $model->setPassword($model->password);
            if( $model->save() ) {
                return true;
            }
        }
        return $model;
    }

    public function getUserCountByPeriod($startAt=null, $endAt=null)
    {
        $model = User::find();
        if( $startAt != null && $endAt != null ){
            $model->andWhere(["between", "created_at", $startAt, $endAt]);
        }else if ($startAt != null){
            $model->andwhere([">", "created_at", $startAt]);
        } else if($endAt != null){
            $model->andWhere(["<", "created_at", $endAt]);
        }
        return $model->count('id');
    }
}