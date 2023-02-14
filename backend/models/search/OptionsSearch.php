<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:49:41
 */
 

namespace backend\models\search;

use backend\models\form\AdForm;
use common\libs\Constants;
use common\models\Options;
use yii\data\ActiveDataProvider;

/**
 * Class OptionsSearch
 * @package backend\models\search
 *
 * @property integer $id
 * @property integer $type
 * @property string $name
 * @property string $value
 * @property integer $input_type
 * @property string $tips
 * @property integer $autoload
 * @property integer $sort
 */
class OptionsSearch extends \yii\base\Model implements SearchInterface
{
    public $id = null;

    public $type = null;

    public $name = null;

    public $value = null;

    public $input_type = null;

    public $tips = null;

    public $autoload = null;

    public $sort = null;


    public function rules()
    {
        return [
            [['id', 'sort'], 'integer'],
            [['type'], 'in', 'range'=>[Options::TYPE_SYSTEM, Options::TYPE_CUSTOM, Options::TYPE_BANNER, Options::TYPE_AD]],
            [['name', 'value', 'tips'], 'safe'],
            [['input_type'], 'in', 'range' => Constants::getInputTypeItems()],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    public function search(array $params = [], array $options = [])
    {
        switch ($this->type){
            case Options::TYPE_AD:
                $query = AdForm::find()->andWhere(['type' => $this->type]);
                break;
            default:
                $query = Options::find()->andFilterWhere(['type' => $this->type]);
        }
        $query = $query->orderBy(['id'=>SORT_DESC]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (! $this->load($params)) {
            return $dataProvider;
        }
        $query->andFilterWhere(['id' => $this->id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['value' => $this->value])
            ->andFilterWhere(['input_type' => $this->input_type])
            ->andFilterWhere(['like', 'tips', $this->tips])
            ->andFilterWhere(['autoload' => $this->autoload])
            ->andFilterWhere(['sort' => $this->sort]);
        return $dataProvider;
    }
}