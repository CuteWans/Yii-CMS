<?php

namespace backend\controllers;

use Yii;
use common\services\MemberServiceInterface;
use common\services\MemberService;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;
use backend\actions\ViewAction;
/**
 * MemberController implements the CRUD actions for Member model.
 */
class MemberController extends \yii\web\Controller
{
    /**
    * @auth
    * - item group=未分类 category=Members description-get=列表 sort=000 method=get
    * - item group=未分类 category=Members description=创建 sort-get=001 sort-post=002 method=get,post  
    * - item group=未分类 category=Members description=修改 sort=003 sort-post=004 method=get,post  
    * - item group=未分类 category=Members description-post=删除 sort=005 method=post  
    * - item group=未分类 category=Members description-post=排序 sort=006 method=post  
    * - item group=未分类 category=Members description-get=查看 sort=007 method=get  
    * @return array
    */
    public function actions()
    {
        /** @var MemberServiceInterface $service */
        $service = Yii::$app->get(MemberServiceInterface::ServiceName);
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function($query, $indexAction) use($service){
                    $result = $service->getList($query);
                    return [
                        'dataProvider' => $result['dataProvider'],
                        'searchModel' => $result['searchModel'],                    ];
                }
            ],
            'create' => [
                'class' => CreateAction::className(),
                'doCreate' => function($postData, $createAction) use($service){
                    return $service->create($postData);
                },
                'data' => function($createResultModel, $createAction) use($service){
                    $model = $createResultModel === null ? $service->newModel() : $createResultModel;
                    return [
                        'model' => $model,
                    ];
                }
            ],
            'update' => [
                'class' => UpdateAction::className(),
                // 'primaryKeyIdentity' => 'member_uid',
                'doUpdate' => function($member_uid, $postData, $updateAction) use($service){
                    return $service->update($member_uid, $postData, ['scenario'=>'update']);
                },
                'data' => function($member_uid, $updateResultModel, $updateAction) use($service){
                    $model = $updateResultModel === null ? $service->getDetail($member_uid, ['scenario'=>'update']) : $updateResultModel;
                    return [
                        'model' => $model,
                    ];
                }
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                // 'primaryKeyIdentity' => 'member_uid',
                'doDelete' => function($member_uid, $deleteAction) use($service){
                    return $service->delete($member_uid);
                },
            ],
            'sort' => [
                'class' => SortAction::className(),
                'doSort' => function($id, $sort, $sortAction) use($service){
                    return $service->sort($id, $sort);
                },
            ],
            'view-layer' => [
                'class' => ViewAction::className(),
                // 'primaryKeyIdentity' => 'member_uid',
                'data' => function($member_uid, $viewAction) use($service){
                    return [
                        'model' => $service->getDetail($member_uid),
                    ];
                },
            ],
        ];
    }

}
