<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:06:04
 */
 

namespace common\services;


use backend\models\search\FriendlyLinkSearch;
use common\models\FriendlyLink;

class FriendlyLinkService extends Service implements FriendlyLinkServiceInterface
{
    public function getSearchModel(array $options=[])
    {
        return new FriendlyLinkSearch();
    }

    public function getModel($id, array $options=[])
    {
        return FriendlyLink::findOne($id);
    }

    public function newModel(array $options=[]){
        $model = new FriendlyLink();
        $model->loadDefaultValues();
        return $model;
    }

    public function getFriendlyLinks()
    {
        return FriendlyLink::find()->where(['status' => FriendlyLink::DISPLAY_YES])->orderBy(['sort' => SORT_ASC, 'id' => SORT_DESC])->all();
    }

    public function getFriendlyLinkCountByPeriod($startAt=null, $endAt=null)
    {
        $model = FriendlyLink::find();
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