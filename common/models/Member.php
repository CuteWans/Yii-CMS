<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%member}}".
 *
 * @property int $member_uid
 * @property string $member_name
 * @property string $member_sex
 * @property int $member_age
 * @property int $member_number
 * @property string $member_major
 * @property string $member_intro
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%member}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_name', 'member_sex', 'member_major', 'member_intro'], 'string'],
            [['member_age', 'member_number'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'member_uid' => Yii::t('app', 'Member Uid'),
            'member_name' => Yii::t('app', 'Member Name'),
            'member_sex' => Yii::t('app', 'Member Sex'),
            'member_age' => Yii::t('app', 'Member Age'),
            'member_number' => Yii::t('app', 'Member Number'),
            'member_major' => Yii::t('app', 'Member Major'),
            'member_intro' => Yii::t('app', 'Member Intro'),
        ];
    }
}
