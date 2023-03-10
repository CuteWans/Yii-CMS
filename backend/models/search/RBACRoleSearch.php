<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:49:53
 */
 

namespace backend\models\search;


use backend\models\form\RBACRoleForm;
use yii\data\ArrayDataProvider;

class RBACRoleSearch extends RBACRoleForm implements SearchInterface
{
    public function search(array $params = [], array $options = [])
    {
        $roles = $options['roles'];

        if( !$this->load( $params ) ){
            $sortedRoles = [];
            foreach ($roles as $item){
                $model = new RBACRoleForm();
                $model->setAttributes($item);
                $sortedRoles[] = $model;
            }

            $dataProvider = new ArrayDataProvider([
                'allModels' => $sortedRoles,
                'pagination' => [
                    'pageSize' => -1,
                ],
            ]);
            return $dataProvider;
        }
        $classNameArray = explode('\\', self::className());
        $className = end($classNameArray);
        if (isset($params[$className])) {
            $searchParams = $params[$className];
            foreach ($searchParams as $searchParamKey => $searchParamValue) {
                if ($searchParamValue !== '') {
                    foreach ($roles as $key => $role) {
                        if (in_array($searchParamKey, ['sort'])) {
                            if ($role[$searchParamKey] != $searchParamValue) {
                                unset($roles[$key]);
                            }
                        } else {
                            if (strpos($role[$searchParamKey], $searchParamValue) === false) {
                                unset($roles[$key]);
                            }
                        }
                    }
                }
            }
        }

        $sortedRoles = [];
        foreach ($roles as $item){
            $model = new RBACRoleForm();
            $model->setAttributes($item);
            $sortedRoles[] = $model;
        }

        $dataProvider = new ArrayDataProvider([
            'allModels' => $sortedRoles,
            'pagination' => [
                'pageSize' => -1,
            ],
        ]);
        return $dataProvider;
    }
}