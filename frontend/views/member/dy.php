<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:12:18
 */
?>

<!-- <?php var_dump($member)?>
<?php var_dump($member->member_name)?>

<?= $member->member_name ?> -->

<div class = "introduction">
    <div class = "introduction-main">
        <div class = "l">
            <img src="static/images/dy.jpg" width="220px"></img>
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

