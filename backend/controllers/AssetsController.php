<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:38:58
 */
 

namespace backend\controllers;

use Yii;
use backend\widgets\ueditor\UeditorAction;
use yii\helpers\FileHelper;
use yii\web\Response;
use yii\web\UploadedFile;

class AssetsController extends \yii\web\Controller
{

    public function actions()
    {
        return [
            'ueditor' => [
                'class' => UeditorAction::className(),
            ],
        ];
    }

    public function actionWebuploader()
    {
        Yii::$app->getResponse()->format = Response::FORMAT_JSON;
        $upload = UploadedFile::getInstanceByName("file");
        if ($upload !== null) {
            if( !in_array(strtolower($upload->getExtension()), ['png', 'jpg', 'jpeg', 'gif', 'bmp', 'webp']) ){
                return [
                    "code"=>1,
                    "msg" => Yii::t("app", 'Only picture allowed'),
                ];
            }
            $uploadPath = Yii::getAlias("@uploads/webuploader");
            if( strpos(strrev($uploadPath), '/') !== 0 ) $uploadPath .= '/';
            if (! FileHelper::createDirectory($uploadPath)) {
                return [
                    'code' => 0,
                    'msg' => Yii::t('app', "Create directory failed " . $uploadPath)
                ];
            }
            $fullName = isset($options['filename']) ? $uploadPath . uniqid() : $uploadPath . date('YmdHis') . '_' . uniqid() . '.' . $upload->getExtension();
            if (! $upload->saveAs($fullName)) {
                return[
                    'code' => 1,
                    'msg' => Yii::t('app', 'Upload {attribute} error: ' . $upload->error, ['attribute' => Yii::t('app', "File")])
                ] ;
            }
            $attachment = str_replace(Yii::getAlias('@frontend/web'), '', $fullName);
            /* @var $cdn \feehi\cdn\TargetInterface */
            $cdn = Yii::$app->get('cdn');
            $cdn->upload($fullName, $attachment);
            return [
                "code" => 0,
                "url" => $cdn->getCdnUrl($attachment),
                "attachment" => $attachment
            ];
        }
        return [
            "code"=>1,
            "msg" => Yii::t("app", 'File cannot be empty'),
        ];

    }

}