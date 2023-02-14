<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:09:49
 */
 

namespace frontend\models\form;

use Yii;
use common\models\Article;

class ArticlePasswordForm extends \yii\base\Model
{
    public $password;

    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'max'=>20]
        ];
    }

    public function attributeLabels()
    {
        return [
            "password" => Yii::t('app', 'Password'),
        ];
    }

    public function checkPassword($id)
    {
        if( $this->password == Article::findOne($id)['password'] ){
            $session = Yii::$app->getSession();
            $session->set("article_password_" . $id, true);
            return true;
        }
        $this->addError('password', Yii::t('frontend', 'Password error'));
        return false;
    }
}