<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:50:05
 */
 

namespace backend\models\search;

use Yii;
use common\models\User;
use backend\behaviors\TimeSearchBehavior;
use backend\components\search\SearchEvent;
use yii\data\ActiveDataProvider;

class UserSearch extends User implements SearchInterface
{

    public function behaviors()
    {
        return [
            TimeSearchBehavior::className()
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'created_at', 'updated_at'], 'string'],
            ['status', 'integer'],
        ];
    }

    /**
     * @param array $params
     * @param array $options
     * @return \yii\data\ActiveDataProvider
     * @throws \yii\base\InvalidConfigException
     */
    public function search(array $params = [], array $options = [])
    {
        $query = User::find();
        /** @var ActiveDataProvider $dataProvider */
        $dataProvider = Yii::createObject([
            'class' => ActiveDataProvider::className(),
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                    'updated_at' => SORT_DESC,
                    'username' => SORT_ASC,
                ]
            ]
        ]);
        $this->load($params);
        if (! $this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['=', 'status', $this->status]);

        $this->trigger(SearchEvent::BEFORE_SEARCH, Yii::createObject([ 'class' => SearchEvent::className(), 'query'=>$query]));
        return $dataProvider;
    }

}