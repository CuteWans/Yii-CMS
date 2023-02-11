<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Member */

$this->title = $model->member_uid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Members'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'member_uid',
            'member_name:ntext',
            'member_sex:ntext',
            'member_age',
            'member_number',
            'member_major:ntext',
            'member_intro:ntext',
        ],
    ]) ?>

</div>
