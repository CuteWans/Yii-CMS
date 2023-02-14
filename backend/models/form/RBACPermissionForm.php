<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:47:29
 */
 

namespace backend\models\form;


use Yii;
use yii\rbac\Permission;

class RBACPermissionForm extends \yii\base\Model
{
    public $route;

    public $method;

    public $description;

    public $sort;

    public $group;

    public $category;

    public function rules(){
        return [
            [['route', 'method', 'description', 'group', 'category'], 'required'],
            [['sort'], 'number'],
            [['sort'], 'default', 'value'=>0],
            [
                ['route'],
                'match',
                'pattern' => '/^[\/].*/',
                'message' => Yii::t('app', Yii::t('app', 'Must begin with "/" like "/module/controller/action" format')),
                'on' => 'permission'
            ],
        ];
    }

    public function getName()
    {
        return $this->route . ":" . $this->method;
    }

    public function getData()
    {
        return json_encode([
            'group' => $this->group,
            'sort' => $this->sort,
            'category' => $this->category,
        ]);
    }

    public function setAttributes($values, $safeOnly = true)
    {
        if( $values instanceof Permission){
            $temp = explode(":", $values->name);
            $this->route = $temp[0];
            $this->method = $temp[1];
            $this->description = $values->description;
            $data = json_decode($values->data, true);
            $this->sort = $data['sort'];
            $this->group = $data['group'];
            $this->category = $data['category'];
        }else{
            parent::setAttributes($values, $safeOnly);
        }
    }

    public function attributeLabels()
    {
        return [
            "route" => Yii::t('app', 'Route'),
            "method" => Yii::t('app', 'HTTP Method'),
            "description" => Yii::t('app', 'Description'),
            "group" => Yii::t('app', 'Group'),
            "category" => Yii::t('app', 'Category'),
            "sort" => Yii::t('app', 'Sort'),
            "name" => Yii::t('app', 'Role'),
        ];
    }
}