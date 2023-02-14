<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:02:42
 */
 

namespace common\models;

use Yii;
use feehi\cdn\DummyTarget;

/**
 * This is the model class for table "{{%content}}".
 *
 * @property string $id
 * @property string $aid
 * @property string $content
 * @property Article $a
 */
class ArticleContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_content}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aid'], 'required'],
            [['aid'], 'integer'],
            [['content'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'aid' => Yii::t('app', 'Aid'),
            'content' => Yii::t('app', 'Content'),
        ];
    }

    public function beforeSave($insert)
    {
        /** @var $cdn \feehi\cdn\TargetInterface */
        $cdn = Yii::$app->get('cdn');
        if( $cdn instanceof DummyTarget){//未使用cdn
            $baseUrl = Yii::$app->params['site']['url'];
        }else{
            $baseUrl = $cdn->host;
        }
        $this->content = str_replace($baseUrl, Yii::$app->params['site']['sign'], $this->content);
        return true;
    }

    public function afterFind()
    {
        /** @var $cdn \feehi\cdn\TargetInterface */
        $cdn = Yii::$app->get('cdn');
        if( $cdn instanceof DummyTarget){//未使用cdn
            $baseUrl = Yii::$app->params['site']['url'];
        }else{
            $baseUrl = $cdn->host;
        }
        $this->content = str_replace(Yii::$app->params['site']['sign'], $baseUrl, $this->content);

        if (! isset(Yii::$app->params['cdnUrl']) || Yii::$app->params['cdnUrl'] == '') {
            return;
        }
        if (strpos($this->content, 'src="/uploads"')) {
            $pattern = "/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
            preg_match_all($pattern, $this->content, $matches);
            $matches[1] = array_unique($matches[1]);
            foreach ($matches[1] as $v) {
                $this->content = str_replace($v, Yii::$app->params['cdnUrl'] . $v, $this->content);
            }
        } else {
            $this->content = str_replace(Yii::$app->params['site']['url'], Yii::$app->params['cdnUrl'], $this->content);
        }
    }
}
