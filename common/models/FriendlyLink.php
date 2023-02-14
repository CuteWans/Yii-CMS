<?php
 /*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:58:56
 */

namespace common\models;

use Yii;
use common\helpers\Util;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%friend_link}}".
 *
 * @property string $id
 * @property string $name
 * @property string $image
 * @property string $url
 * @property string $target
 * @property string $sort
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class FriendlyLink extends ActiveRecord
{

    const DISPLAY_YES = 1;
    const DISPLAY_NO = 0;


    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%friendly_link}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['target'], 'string'],
            [['sort', 'status', 'created_at', 'updated_at'], 'integer'],
            [['sort'], 'compare', 'compareValue' => 0, 'operator' => '>='],
            [['name', 'url'], 'string', 'max' => 255],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif, webp'],
            [['name', 'url'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'image' => Yii::t('app', 'Image'),
            'url' => Yii::t('app', 'Url'),
            'target' => Yii::t('app', 'Target'),
            'sort' => Yii::t('app', 'Sort'),
            'status' => Yii::t('app', 'Is Display'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function beforeValidate()
    {
        if($this->image !== "0") {//为0表示需要删除图片，Util::handleModelSingleFileUpload()会有判断删除图片
            $this->image = UploadedFile::getInstance($this, "image");
        }
        return parent::beforeValidate();
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        Util::handleModelSingleFileUpload($this, 'image', $insert, '@friendlylink/');
        return parent::beforeSave($insert);
    }

    public function beforeDelete()
    {
        if( !empty( $this->image ) ){
            Util::deleteThumbnails(Yii::getAlias('@frontend/web/') . str_replace(Yii::$app->params['site']['url'], '', $this->image), [], true);
        }
        return parent::beforeDelete();
    }

    public function afterFind()
    {
        /** @var $cdn \feehi\cdn\TargetAbstract $cdn */
        $cdn = Yii::$app->get('cdn');
        $this->image = $cdn->getCdnUrl($this->image);
    }
}
