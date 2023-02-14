<?php
/*
 * @Description: 奴才驾到CMS-friendly_link_controller
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:44:22
 */
 

namespace backend\controllers;

use Yii;
use common\services\FriendlyLinkServiceInterface;
use backend\actions\ViewAction;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;

/**
 * friendly link management
 * - data:
 *          table friendly_link
 *
 * Class FriendLinkController
 * @package backend\controllers
 */
class FriendlyLinkController extends \yii\web\Controller
{

    /**
     * @auth
     * - item group=其他 category=仓库链接 description-get=列表 sort=700 method=get
     * - item group=其他 category=仓库链接 description-get=查看 sort=701 method=get  
     * - item group=其他 category=仓库链接 description=创建 sort-get=702 sort-post=703 method=get,post  
     * - item group=其他 category=仓库链接 description=修改 sort-get=704 sort-post=705 method=get,post  
     * - item group=其他 category=仓库链接 description-post=删除 sort=706 method=post  
     * - item group=其他 category=仓库链接 description-post=排序 sort=707 method=post  
     * @return array
     * @throws \yii\base\InvalidConfigException
     */
    public function actions()
    {
        /** @var FriendlyLinkServiceInterface $service */
        $service =  Yii::$app->get(FriendlyLinkServiceInterface::ServiceName);
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(array $query)use($service){
                    $result = $service->getList($query);
                    return [
                        'dataProvider' => $result['dataProvider'],
                        'searchModel' => $result['searchModel'],
                    ];
                }
            ],
            'view-layer' => [
                'class' => ViewAction::className(),
                'data' => function($id)use($service){
                    return [
                        'model' => $service->getDetail($id),
                    ];
                },
            ],
            'create' => [
                'class' => CreateAction::className(),
                'doCreate' => function(array $postData) use($service){
                    return $service->create($postData);
                },
                'data' => function($createResultModel)use($service){
                    $model = $createResultModel === null ? $service->newModel() : $createResultModel;
                    return[
                        'model' => $model,
                    ];
                },
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'doUpdate' => function($id, array $postData) use($service){
                    return $service->update($id, $postData);
                },
                'data' => function($id, $updateResultModel)use($service){
                    $model = $updateResultModel === null ? $service->getDetail($id) : $updateResultModel;
                    return [
                        'model' => $model,
                    ];
                },
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'doDelete' => function($id)use($service){
                    return $service->delete($id);
                },
            ],
            'sort' => [
                'class' => SortAction::className(),
                'doSort' => function($id, $sort)use($service){
                    return $service->sort($id, $sort);
                },
            ],
        ];
    }
}
