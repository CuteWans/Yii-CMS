<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:49:35
 */
 

namespace backend\models\search;

use backend\behaviors\TimeSearchBehavior;
use common\models\Menu;
use yii\data\ArrayDataProvider;


class MenuSearch extends Menu implements SearchInterface
{

    public function attributes()
    {
        return [
            "name", "url", "sort", "target", "is_display", "is_absolute_url"
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'url', "target"], 'string'],
            [['sort', 'is_display', "is_absolute_url"], 'integer'],
        ];
    }

    public function behaviors()
    {
        return [
            TimeSearchBehavior::className()
        ];
    }

    public function search(array $params = [], array $options = [])
    {
        $menus = $options['dataSource'];
        if( !$this->load($params) ) {
            return new ArrayDataProvider([
                'allModels' => $menus,
                'pagination' => [
                    'pageSize' => -1,
                ],
            ]);
        }
        $classNameArray = explode('\\', self::className());
        $className = end($classNameArray);
        if (isset($params[$className])) {
            $searchParams = $params[$className];
            foreach ($searchParams as $searchParamKey => $searchParamValue) {
                if ($searchParamValue !== '') {
                    foreach ($menus as $key => $menu) {
                        if (in_array($searchParamKey, ['sort'])) {
                            if ($menu[$searchParamKey] != $searchParamValue) {
                                unset($menus[$key]);
                            }
                        } else {
                            if (strpos($menu[$searchParamKey], $searchParamValue) === false) {
                                unset($menus[$key]);
                            }
                        }
                    }
                }
            }
        }
        return new ArrayDataProvider([
            'allModels' => $menus,
            'pagination' => [
                'pageSize' => -1,
            ],
        ]);
    }
}