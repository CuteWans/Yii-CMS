<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:47:44
 */
 
namespace backend\models\form;

use yii;
use yii\base\Event;
use yii\db\BaseActiveRecord;
use yii\base\InvalidParamException;
use common\models\AdminUser;

/**
 * Password reset form
 */
class ResetPasswordForm extends \yii\base\Model
{
    public $password;

    private $_user;


    public function __construct($token, $config = [])
    {
        if (empty($token) || ! is_string($token)) {
            throw new InvalidParamException('Password reset token cannot be blank.');
        }
        $this->_user = AdminUser::findByPasswordResetToken($token);
        if (! $this->_user) {
            throw new InvalidParamException('Wrong password reset token.');
        }
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'password' => yii::t('app', 'Password'),
        ];
    }

    /**
     * Resets password.
     *
     * @return boolean if password was reset.
     */
    public function resetPassword()
    {
        $user = $this->_user;
        $user->setPassword($this->password);
        $user->removePasswordResetToken();
        Event::off(BaseActiveRecord::className(), BaseActiveRecord::EVENT_AFTER_UPDATE);

        return $user->save(false);
    }
}
