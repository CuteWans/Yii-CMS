<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 09:35:55
 */

namespace backend\actions;

use Yii;
use stdClass;
use Closure;
use backend\actions\helpers\Helper;
use yii\base\Exception;
use yii\base\InvalidArgumentException;
use yii\web\MethodNotAllowedHttpException;
use yii\web\Response;
use yii\web\UnprocessableEntityHttpException;

/**
 * backend sort
 *
 * Class SortAction
 * @package backend\actions
 */
class SortAction extends \yii\base\Action
{

    /**
     * @var Closure
     */
    public $doSort = null;

    /**
     * @var string after success doUpdate tips message showed in page top
     */
    public $successTipsMessage = "success";


    public function init()
    {
        parent::init();
        if( $this->successTipsMessage === "success"){
            $this->successTipsMessage = Yii::t("app", "success");
        }
    }

    /**
     * sort
     *
     * @return array|\yii\web\Response
     * @throws MethodNotAllowedHttpException
     * @throws UnprocessableEntityHttpException
     * @throws \yii\base\Exception
     */
    public function run()
    {
        if (Yii::$app->getRequest()->getIsPost()) {
            if(!$this->doSort instanceof Closure){
                throw new Exception(__CLASS__ . "::doSort must be closure");
            }
            $post = Yii::$app->getRequest()->post();
            if (isset($post[Yii::$app->getRequest()->csrfParam])) {
                unset($post[Yii::$app->getRequest()->csrfParam]);
            }
            reset($post);
            $temp = current($post);
            $condition = array_keys($temp)[0];
            $value = $temp[$condition];
            $condition = json_decode($condition, true);
            if (!is_array($condition)) throw new InvalidArgumentException("SortColumn generate html must post data like xxx[{pk:'unique'}]=number");
            $result = call_user_func_array($this->doSort, [$condition, $value, $this]);

            if (Yii::$app->getRequest()->getIsAjax()) {
                Yii::$app->getResponse()->format = Response::FORMAT_JSON;
                if( $result === true ){
                    return ['code'=>0, 'msg'=>'success', 'data'=>new stdClass()];
                }else{
                    throw new UnprocessableEntityHttpException(Helper::getErrorString($result));
                }
            }else {
                if ($result === true) {
                    Yii::$app->getSession()->setFlash('success', $this->successTipsMessage);
                } else {
                    Yii::$app->getSession()->setFlash('error', Helper::getErrorString($result));
                }
                return $this->controller->goBack();
            }

        }else{
            throw new MethodNotAllowedHttpException(Yii::t('app', "Sort must be POST http method"));
        }
    }
}