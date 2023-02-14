<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:48:57
 */
 

namespace backend\models\search;

use Yii;
use common\models\Comment;
use backend\behaviors\TimeSearchBehavior;
use backend\components\search\SearchEvent;
use common\models\Article;
use yii\data\ActiveDataProvider;

class CommentSearch extends Comment implements SearchInterface
{

    public $article_title;
    

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
            [['article_title', 'created_at', 'updated_at', 'nickname', 'content'], 'string'],
            [['aid', 'status'], 'integer'],
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
        $query = Comment::find()->with('article');
        /** @var ActiveDataProvider $dataProvider */
        $dataProvider = Yii::createObject([
            'class' => ActiveDataProvider::className(),
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ]
        ]);
        $this->load($params);
        if (! $this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['status' => $this->status])
            ->andFilterWhere(['aid' => $this->aid])
            ->andFilterWhere(['like', 'content', $this->content]);

        if ($this->article_title != '') {
            $articles = Article::find()
                ->where(['like', 'title', $this->article_title])
                ->select(['id', 'title'])
                ->indexBy('id')
                ->asArray()
                ->all();
            $aidArray = [];
            foreach ($articles as $k => $v) {
                array_push($aidArray, $k);
            }
            $query->andFilterWhere(['aid' => $aidArray]);
        }

        $this->trigger(SearchEvent::BEFORE_SEARCH, Yii::createObject(['class' => SearchEvent::className(), 'query'=>$query]));
        return $dataProvider;
    }
}