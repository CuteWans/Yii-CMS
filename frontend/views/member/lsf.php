<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
?>

<!-- <?php var_dump($member)?>
<?php var_dump($member->member_name)?>

<?= $member->member_name ?> -->

<?= DetailView::widget([         // 调用 DetailView::widget() 方法
        'model' => $member,           // model 这里可以是一个模型类的实例，也可以是一个数组
        'attributes' => [//所有需要展示的模型属性
        [
            'attribute'=>'member_name',
            'label'=>'姓名',
            'value'=>$member->member_name
        ],
        [
            'attribute'=>'member_sex',
            'label'=>'性别',
            'value'=>$member->member_sex
        ],
        [
            'attribute'=>'member_number',
            'label'=>'学号',
            'value'=>$member->member_number
        ],
        [
            'attribute'=>'member_intro',
            'label'=>'自我介绍',
            'value'=>$member->member_intro
        ],
    ],
    'template' => '<tr><th style="text-align:right">{label}：</th><td>{value}</td></tr>',//自定义表格样式
    'options' => ['class' => 'table table-striped']//为表格添加样式类
]) ?>

