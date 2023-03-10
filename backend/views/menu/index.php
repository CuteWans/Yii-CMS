<?php
 /*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:57:57
 */

/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ArrayDataProvider
 * @var $searchModel backend\models\search\MenuSearch
 */

use backend\grid\DateColumn;
use backend\grid\GridView;
use backend\grid\SortColumn;
use backend\grid\StatusColumn;
use common\models\Menu;
use backend\widgets\Bar;
use common\libs\Constants;
use yii\helpers\Html;
use yii\helpers\Url;
use backend\grid\CheckboxColumn;
use backend\grid\ActionColumn;

$this->title = "Backend Menus";
$this->params['breadcrumbs'][] = Yii::t('app', 'Backend Menus');
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?= Bar::widget() ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'layout' => '{items}',
                    'columns' => [
                        [
                            'class' => CheckboxColumn::className(),
                        ],
                        [
                            'attribute' => 'name',
                            'label' => Yii::t('app', 'Name'),
                            'format' => 'html',
                            'value' => function ($model, $key, $index, $column) {
                                return $model['prefix_level_name'];
                            }
                        ],
                        [
                            'attribute' => 'icon',
                            'label' => Yii::t('app', 'Icon'),
                            'format' => 'html',
                            'value' => function ($model) {
                                return "<i class='fa {$model['icon']}'></i>";
                            }
                        ],
                        [
                            'attribute' => 'url',
                            'label' => Yii::t('app', 'Url'),
                            'value' => function($model){
                                /** @var Menu $mddel */
                                return $model->convertJSONStringToRelativeUrl();
                            }
                        ],
                        [
                            'class' => SortColumn::className(),
                            'primaryKey' => function($model){
                                return ["id" => $model["id"]];
                            },
                            'label' => Yii::t('app', 'Sort')
                        ],
                        [
                            'class' => StatusColumn::className(),
                            'attribute' => 'is_display',
                            'formName' => (new Menu)->formName() . '[is_display]',
                            'label' => Yii::t('app', 'Is Display'),
                            'filter' => Constants::getYesNoItems()
                        ],
                        [
                            'class' => DateColumn::className(),
                            'attribute' => 'created_at',
                            'label' => Yii::t('app', 'Created At'),
                        ],
                        [
                            'class' => DateColumn::className(),
                            'attribute' => 'updated_at',
                            'label' => Yii::t('app', 'Updated At'),
                        ],
                        [
                            'class' => ActionColumn::className(),
                            'width' => '190px',
                            'buttons' => [
                                'create' => function ($url, $model, $key) {
                                    return Html::a('<i class="fa  fa-plus" aria-hidden="true"></i> ', Url::to([
                                        'create',
                                        'parent_id' => $model['id']
                                    ]), [
                                        'title' => Yii::t('app', 'Create'),
                                        'data-pjax' => '0',
                                        'class' => 'btn-sm J_menuItem',
                                    ]);
                                }
                            ],
                            'template' => '{create} {view-layer} {update} {delete}',
                        ]
                    ]
                ]) ?>
            </div>
        </div>
    </div>
</div>