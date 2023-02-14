<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:48:16
 */
 

namespace backend\models\search;

use Yii;
use backend\behaviors\TimeSearchBehavior;
use backend\components\search\SearchEvent;
use common\models\AdminLog;
use yii\data\ActiveDataProvider;

class AdminLogSearch extends AdminLog implements SearchInterface
{

    public $admin_username;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'created_at'], 'string'],
            [['user_id'], 'integer'],
            [['route'], 'string', 'max' => 255],
            ['admin_username', 'safe']
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimeSearchBehavior::className(),
                'timeAttributes' => [AdminLog::tableName() . '.created_at' => 'created_at'],
            ]
        ];
    }

    /**
     * @param array $params
     * @param array $options
     * @return ActiveDataProvider
     * @throws \yii\base\InvalidConfigException
     */
    public function search(array $params = [], array $options = [])
    {
        $query = AdminLog::find()->orderBy(["id"=>SORT_DESC]);
        $query->joinWith(['user']);
        /** @var ActiveDataProvider $dataProvider */
        $dataProvider = Yii::createObject([
            'class' => ActiveDataProvider::className(),
            'query' => $query,
        ]);
        $dataProvider->setSort([
            'attributes' => [
                'user_username' => [
                    'asc' => ['admin_user.id' => SORT_ASC],
                    'desc' => ['admin_user.id' => SORT_DESC],
                ],
                'id' => [
                    'asc' => ['admin_log.id' => SORT_ASC],
                    'desc' => ['admin_log.id' => SORT_DESC],
                ],
                'created_at' => [
                    'asc' => ['created_at' => SORT_ASC],
                    'desc' => ['created_at' => SORT_DESC],
                ],
                'route' => [
                    'asc' => ['route' => SORT_ASC],
                    'desc' => ['route' => SORT_DESC],
                ],
                'description' => [
                    'asc' => ['description' => SORT_ASC],
                    'desc' => ['description' => SORT_DESC],
                ],
            ]
        ]);

        $this->load($params);
        if (! $this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['id' => $this->id])
            ->andFilterWhere(['like', 'route', $this->route])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'username', $this->admin_username]);
        $this->trigger(SearchEvent::BEFORE_SEARCH, Yii::createObject(['class' => SearchEvent::className(), 'query'=>$query]));
        return $dataProvider;
    }

}