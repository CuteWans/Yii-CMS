<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:39:40
 */
 

namespace backend\controllers;

use Yii;
use yii\helpers\FileHelper;


class ClearController extends \yii\web\Controller
{

    /**
     * remove all backend cache
     *
     * @auth - item group=其他 category=缓存 description-get=清除后台缓存 sort=720 method=get
     * @return string
     * @throws \yii\base\ErrorException
     */
    public function actionBackend()
    {
        FileHelper::removeDirectory(Yii::getAlias('@runtime/cache'));
        $paths = [Yii::getAlias('@admin/assets'), Yii::getAlias('@backend/web/assets')];
        $this->deleteFiles($paths);
        Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Success'));
        return $this->render('clear');
    }

    /**
     * remove all frontend cache
     *
     * @auth - item group=其他 category=缓存 description-get=清除前台缓存 sort=721 method=get
     * @return string
     * @throws \yii\base\ErrorException
     */
    public function actionFrontend()
    {
        FileHelper::removeDirectory(Yii::getAlias('@frontend/runtime/cache'));
        $paths = [Yii::getAlias('@frontend/web/assets')];
        $this->deleteFiles($paths);
        Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Success'));
        return $this->render('clear');
    }

    /**
     * @param array $paths
     * @throws \yii\base\ErrorException
     */
    private function deleteFiles(array $paths)
    {
        foreach ($paths as $path) {
            $fp = opendir($path);
            while (false !== ($file = readdir($fp))) {
                if (! in_array($file, ['.', '..', '.gitignore'])) {
                    FileHelper::removeDirectory($path . DIRECTORY_SEPARATOR . $file);
                }
            }
        }
    }

}