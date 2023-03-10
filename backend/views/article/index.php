<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:54:18
 */

/**
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $searchModel backend\models\search\ArticleSearch
 * @var $categories []string
 * @var $frontendURLManager yii\web\UrlManager
 */

use backend\grid\DateColumn;
use backend\grid\GridView;
use backend\grid\SortColumn;
use common\widgets\JsBlock;
use yii\helpers\Url;
use common\libs\Constants;
use yii\helpers\Html;
use backend\widgets\Bar;
use yii\widgets\Pjax;
use backend\grid\CheckboxColumn;
use backend\grid\ActionColumn;
use backend\grid\StatusColumn;

$this->title = 'Articles';
$this->params['breadcrumbs'][] = Yii::t('app', 'Articles');
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?= Bar::widget() ?>
                <?=$this->render('_search', ['model' => $searchModel]); ?>
                <?php Pjax::begin(['id' => 'pjax']); ?>
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
                            'attribute' => 'cid',
                            'label' => Yii::t('app', 'Category'),
                            'value' => function ($model) {
                                return $model->category ? $model->category->name : Yii::t('app', 'UnClassified');
                            },
                            'filter' => $categories,
                        ],
                        [
                            'attribute' => 'title',
                            'width' => '170',
                            'format' => 'raw',
                            'value' => function($model, $key, $index, $column) use($frontendURLManager) {
                                /** @var common\models\Article  $model */
                                $scriptName = "";
                                if( $frontendURLManager->showScriptName ){
                                    $scriptName = "index.php/";
                                }
                                $url = $frontendURLManager->enablePrettyUrl ? Yii::$app->params['site']['url'] . $scriptName . 'view/' . $model->id . $frontendURLManager->suffix : Yii::$app->params['site']['url'] . 'index.php?r=article/view&id=' . $model->id . $frontendURLManager->suffix;
                                return Html::a($model->title, $url, ['target' => '_blank', 'data-pjax' => 0]);
                            }
                        ],
                        [
                            'attribute' => 'sort',
                            'class' => SortColumn::className(),
                        ],
                        [
                            'attribute' => 'author_name',
                        ],
                        [
                            'attribute' => 'thumb',
                            'format' => 'raw',
                            'value' => function ($model, $key, $index, $column) {
                                if ($model->thumb == '') {
                                    $num = Constants::YesNo_No;
                                } else {
                                    $num = Constants::YesNo_Yes;
                                }
                                return Html::a(Constants::getYesNoItems($num), $model->thumb ? $model->thumb : 'javascript:void(0)', [
                                    'img' => $model->thumb ? $model->thumb : '',
                                    'class' => 'thumbImg',
                                    'target' => '_blank',
                                    'data-pjax' => 0
                                ]);
                           },
                            'filter' => Constants::getYesNoItems(),
                        ],
                        [
                            'class' => StatusColumn::className(),
                            'attribute' => 'flag_headline',
                            'filter' => Constants::getYesNoItems(),
                        ],
                        [
                            'class' =>StatusColumn::className(),
                            'attribute' => 'flag_recommend',
                            'filter' => Constants::getYesNoItems(),
                        ],
                        [
                            'class' =>StatusColumn::className(),
                            'attribute' => 'flag_slide_show',
                            'filter' => Constants::getYesNoItems(),
                        ],
                        [
                            'class' =>StatusColumn::className(),
                            'attribute' => 'flag_special_recommend',
                            'filter' => Constants::getYesNoItems(),
                        ],
                        [
                            'class' =>StatusColumn::className(),
                            'attribute' => 'flag_roll',
                            'filter' => Constants::getYesNoItems(),
                        ],
                        [
                            'class' =>StatusColumn::className(),
                            'attribute' => 'flag_bold',
                            'filter' => Constants::getYesNoItems(),
                        ],
                        [
                            'class' =>StatusColumn::className(),
                            'attribute' => 'flag_picture',
                            'filter' => Constants::getYesNoItems(),
                        ],
                        [
                            'attribute' => 'status',
                            'format' => 'raw',
                            'value' => function ($model, $key, $index, $column) {
                                /* @var $model common\models\Article */
                                return Html::a(Constants::getArticleStatus($model['status']), ['update', 'id' => $model['id']], [
                                    'class' => 'btn btn-xs btn-rounded ' . ( $model['status'] == Constants::YesNo_Yes ? 'btn-info' : 'btn-default' ),
                                    'data-confirm' => $model['status'] == Constants::YesNo_Yes ? Yii::t('app', 'Are you sure you want to cancel release?') : Yii::t('app', 'Are you sure you want to publish?'),
                                    'data-method' => 'post',
                                    'data-pjax' => '0',
                                    'data-params' => [
                                        $model->formName() . '[status]' => $model['status'] == Constants::YesNo_Yes ? Constants::YesNo_No : Constants::YesNo_Yes
                                    ]
                                ]);
                            },
                            'filter' => Constants::getArticleStatus(),
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
                            'buttons' => [
                                'comment' => function ($url, $model, $key) {
                                    return Html::a('<i class="fa  fa-commenting-o" aria-hidden="true"></i> ', Url::to([
                                        'comment/index',
                                        'CommentSearch[aid]' => $model->id
                                    ]), [
                                        'title' => Yii::t('app', 'Comments'),
                                        'data-pjax' => '0',
                                        'class' => 'btn-sm openContab',
                                    ]);
                                }
                            ],
                            'template' => '{view-layer} {update} {delete} {comment}',
                        ],
                    ]
                ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
<?php JsBlock::begin()?>
<script>
    function showImg() {
        t = setTimeout(function () {
        }, 200);
        var url = $(this).attr('img');
        if (url.length === 0) {
            layer.tips('<?=Yii::t('app', 'No picture')?>', $(this));
        } else {
            layer.tips('<img style="max-width: 100px;max-height: 60px" src=' + url + '>', $(this));
        }
    }
    $(document).ready(function(){
        var t;
        $('table tr td a.thumbImg').hover(showImg,function(){
            clearTimeout(t);
        });
    });
    var container = $('#pjax');
    container.on('pjax:send',function(args){
        layer.load(2);
    });
    container.on('pjax:complete',function(args){
        layer.closeAll('loading');
        $('table tr td a.thumbImg').bind('mouseover mouseout', showImg);
        $("input.sort").bind('blur', indexSort);
        lay('.date-time').each(function(){
            var config = {
                elem: this,
                type: this.getAttribute('dateType'),
                range: this.getAttribute('range') === 'true' ? true : ( this.getAttribute('range') === 'false' ? false : this.getAttribute('range') ),
                format: this.getAttribute('format'),
                value: this.getAttribute('value') === 'new Date()' ? new Date() : this.getAttribute('value'),
                isInitValue: this.getAttribute('isInitValue') != 'false',
                min: this.getAttribute('min'),
                max: this.getAttribute('max'),
                trigger: this.getAttribute('trigger'),
                show: this.getAttribute('show') != 'false',
                position: this.getAttribute('position'),
                zIndex: parseInt(this.getAttribute('zIndex')),
                showBottom: this.getAttribute('showBottom') != 'false',
                btns: this.getAttribute('btns').replace(/\[/ig, '').replace(/\]/ig, '').replace(/'/ig,'').replace(/\s/ig, '').split(','),
                lang: this.getAttribute('lang'),
                theme: this.getAttribute('theme'),
                calendar: this.getAttribute('calendar') != 'false',
                mark: JSON.parse(this.getAttribute('mark'))
            };

            if( !this.getAttribute('search') ){//搜素
                config.done = function(value, date, endDate){
                    setTimeout(function(){
                        $(this).val(value);
                        var e = $.Event("keydown");
                        e.keyCode = 13;
                        $(".date-time[search!='true']").trigger(e);
                    },100)
                }
                delete config['value'];
            }

            laydate.render(config);
        });

    });
</script>
<?php JsBlock::end()?>