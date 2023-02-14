<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:05:03
 */
namespace frontend\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use common\models\Member;

class MemberController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionLqx()
    {
        $member = Member::find()->where(['member_uid'=>'1'])->one();

        return $this->render('lqx', [
            'member' => $member,
        ]);
    }
    public function actionLsf()
    {
        $member = Member::find()->where(['member_uid'=>'2'])->one();

        return $this->render('lsf', [
            'member' => $member,
        ]);
    }
    public function actionDy()
    {
        $member = Member::find()->where(['member_uid'=>'3'])->one();

        return $this->render('dy', [
            'member' => $member,
        ]);
    }
}
