<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:46:35
 */
 

namespace backend\models\form;


class AssignPermissionForm extends \yii\base\Model
{
    private $roles = [];

    private $permissions = [];


    public function rules()
    {
        $rules = parent::rules();
        $rules[] = [['roles', 'permissions'], 'safe'];
        return $rules;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function getPermissions()
    {
        return $this->permissions;
    }

    public function setAttributes($values, $safeOnly = true)
    {
        if( isset($values['roles']) ){
            if( !is_array($values['roles']) ){
                $this->roles = [];
            }else {
                $this->roles =$values['roles'];
            }
        }

        if( isset($values['permissions']) ){
            if( !is_array($values['permissions']) ){
                $this->permissions = [];
            }else {
                $temp = array_flip($values['permissions']);
                if( isset($temp['0']) ){
                    unset($temp['0']);
                }
                $this->permissions = $temp;
            }
        }
    }
}