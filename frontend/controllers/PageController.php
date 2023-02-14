<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:09:00
 */
 

namespace frontend\controllers;

use Yii;
use common\services\ArticleServiceInterface;
use yii\web\NotFoundHttpException;

class PageController extends \yii\web\Controller
{

    /**
     * single page
     *
     * @param string $name
     * @return string
     * @throws yii\web\NotFoundHttpException
     * @throws yii\base\InvalidConfigException
     */
    public function actionView($name = '')
    {
        if ($name == '') {
            $name = Yii::$app->getRequest()->getPathInfo();
        }

        /** @var ArticleServiceInterface $service */
        $service = Yii::$app->get(ArticleServiceInterface::ServiceName);
        $model = $service->getArticleSubTitle($name);
        if (empty($model)) {
            throw new NotFoundHttpException('None page named ' . $name);
        }
        $template = "view";
        isset($model->category) && $model->category->template != "" && $template = $model->category->template;
        $model->template != "" && $template = $model->template;
        return $this->render($template, [
            'model' => $model,
            'singlePages' => $service->getSinglePages(),
        ]);
    }

}