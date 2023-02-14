<?php
 /*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:52:07
 */

/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $searchModel backend\models\search\AdminUserSearch
 */

use backend\grid\DateColumn;
use backend\grid\GridView;
use yii\helpers\Url;
use yii\helpers\Html;
use backend\widgets\Bar;
use backend\grid\CheckboxColumn;
use backend\grid\ActionColumn;
use common\models\AdminUser;

$assignment = function ($url, $model) {
    return Html::a('<i class="fa fa-tablet"></i> ' . Yii::t('app', 'Assign Roles'), Url::to([
        'assign',
        'uid' => $model['id']
    ]), [
        'title' => 'assignment',
        'class' => 'btn btn-white btn-sm'
    ]);
};

$this->title = "Admin Users";
$this->params['breadcrumbs'][] = Yii::t('app', 'Admin Users');
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?= Bar::widget([
                    'template' => '{refresh} {create} {delete}'
                ]) ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        [
                            'class' => CheckboxColumn::className(),
                        ],
                        [
                            'attribute' => 'username',
                        ],
                        [
                            'attribute' => 'role',
                            'label' => Yii::t('app', 'Role'),
                            'value' => function ($model) {
                                /** @var $model backend\models\AdminUser */
                                return $model->getRolesNameString();
                            },
                        ],
                        [
                            'attribute' => 'email',
                        ],
                        [
                            'attribute' => 'status',
                            'label' => Yii::t('app', 'Status'),
                            'value' => function ($model) {
                                if($model->status == AdminUser::STATUS_ACTIVE){
                                    return Yii::t('app', 'Normal');
                                }else if( $model->status == AdminUser::STATUS_DELETED ){
                                    return Yii::t('app', 'Disabled');
                                }
                            },
                            'filter' => AdminUser::getStatuses(),
                        ],
                        [
                            'class' => DateColumn::className(),
                            'attribute' => 'created_at',
                        ],
                        [
                            'class' => DateColumn::className(),
                            'attribute' => 'updated_at',
                        ],
                        [
                            'class' => ActionColumn::className(),
                            'buttons' => ['assignment' => $assignment],
                        ],
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>