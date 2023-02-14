<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:05:03
 */
 

namespace common\services;

use backend\models\form\AdForm;
use backend\models\search\OptionsSearch;
use common\models\Options;
use yii\base\Exception;

class AdService extends Service implements AdServiceInterface
{
    public function getSearchModel(array $options = [])
    {
        return new OptionsSearch(['type'=>Options::TYPE_AD]);
    }

    public function getModel($id, array $options = [])
    {
        return AdForm::findOne($id);
    }

    public function newModel(array $options = [])
    {
        $model = new AdForm();
        $model->loadDefaultValues();
        return $model;
    }

    public function getAdByName($name)
    {
        $model = AdForm::findOne(["type"=>Options::TYPE_AD, "name"=>$name]);
        if( $model === null ) throw new Exception("Not exists advertisement named " . $name);
        return $model;
    }

}