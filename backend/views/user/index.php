<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:59:44
 */
 

/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $searchModel backend\models\search\AdminUserSearch
 */

use backend\grid\DateColumn;
use backend\grid\GridView;
use common\models\User;
use backend\widgets\Bar;
use backend\grid\CheckboxColumn;
use backend\grid\ActionColumn;

$this->title = 'Users';
$this->params['breadcrumbs'][] = Yii::t('app', 'Users');
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?= Bar::widget([
                    'template' => '{refresh} {create} {delete}',
                ]) ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        [
                            'class' => CheckboxColumn::className(),
                        ],
                        [
                            'attribute' => 'id',
                        ],
                        [
                            'attribute' => 'username',
                        ],
                        [
                            'attribute' => 'email',
                        ],
                        [
                            'attribute' => 'status',
                            'label' => Yii::t('app', 'Status'),
                            'value' => function ($model) {
                                if($model->status == User::STATUS_ACTIVE){
                                    return Yii::t('app', 'Normal');
                                }else if( $model->status == User::STATUS_DELETED ){
                                    return Yii::t('app', 'Disabled');
                                }
                            },
                            'filter' => User::getStatuses(),
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
                            'width' => '190px',
                        ],
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>