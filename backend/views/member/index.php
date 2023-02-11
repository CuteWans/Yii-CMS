<?php

use backend\widgets\Bar;
use backend\grid\CheckboxColumn;
use backend\grid\ActionColumn;
use backend\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Members');
$this->params['breadcrumbs'][] = yii::t('app', 'Member');
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?= Bar::widget() ?>
                <?=$this->render('_search', ['model' => $searchModel]); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => CheckboxColumn::className()],

                        'member_uid',
                        'member_name:ntext',
                        'member_sex:ntext',
                        'member_age',
                        'member_number',
                        // 'member_major:ntext',
                        // 'member_intro:ntext',

                        ['class' => ActionColumn::className(),],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
