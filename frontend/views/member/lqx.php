<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:12:34
 */
?>

<!-- <?php var_dump($member)?>
<?php var_dump($member->member_name)?>

<?= $member->member_name ?> -->

<!-- <?= DetailView::widget([         // 调用 DetailView::widget() 方法
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
]) ?> -->

<div class = "introduction">
    <div class = "introduction-main">
        <div class = "l">
            <img src="static/images/touxiang.jpg" width="220px"></img>
        </div>
        <div class = "r">
            <p class = "intro-about">
                <?php echo $member->member_intro ?>
            </p>
            <div class = "intro-detail">
                <p style="margin-top: 30px">姓名   |   <?php echo $member->member_name ?></p>
                <p style="margin-top: 30px">性别   |   <?php echo $member->member_sex ?></p>    
                <p style="margin-top: 30px">年龄   |   <?php echo $member->member_age ?></p>    
                <p style="margin-top: 30px">学号   |   <?php echo $member->member_number ?></p>    
                <p style="margin-top: 30px">专业   |   <?php echo $member->member_major ?></p>
            </div>
        </div>
    </div>
</div>

<style>
    .introduction {
        width:1200px;
        margin:0 auto;
        padding:40px 0;
    }
    .introduction-main {
        display:flex;
    }
    .introduction-main .l {
        margin-right:150px;
        margin-left:180px;
        margin-top:75px;
    }
    .introduction .l img {
        border-radius:50%;
    }
    .introduction-main .r .intro-about {
        line-hight:60px;
        font-size:25px;
        color:#555;
    }
    .introduction-main .r .intro-detail {
        margin-top:40px;
        font-size:20px;
        color:#555;
    }
    .introduction-main .r {
        padding-top:40px;
        padding-bottom:40px;
        padding-left:70px;
        padding-right:70px;
        /* text-align: center; */
        border: 8px double #818181;
        border-radius:7%;
    }
</style>