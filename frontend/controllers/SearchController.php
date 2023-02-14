<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:09:08
 */

namespace frontend\controllers;

use Yii;
use frontend\controllers\helpers\Helper;
use common\models\meta\ArticleMetaTag;
use common\models\Article;
use yii\helpers\Html;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

class SearchController extends Controller
{

    /**
     * search
     *
     * @return string
     */
    public function actionIndex()
    {
        $where = ['type' => Article::ARTICLE];
        $query = Article::find()->select([])->where($where);
        $keyword = Yii::$app->getRequest()->get('q');
        $query->andFilterWhere(['like', 'title', $keyword]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'sort' => SORT_ASC,
                    'id' => SORT_DESC,
                ]
            ]
        ]);
        $data = array_merge([
            'dataProvider' => $dataProvider,
            'type' => Yii::t('frontend', 'Search keyword {keyword} results', ['keyword'=>Html::encode($keyword)]),
        ], Helper::getCommonInfos());
        return $this->render('/article/index', $data);
    }

    public function actionTag($tag='')
    {
        $metaTagModel = new ArticleMetaTag();
        $aids = $metaTagModel->getAidsByTag($tag);
        $where = ['type' => Article::ARTICLE];
        $query = Article::find()->select([])->where($where)->where(['in', 'id', $aids]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'sort' => SORT_ASC,
                    'id' => SORT_DESC,
                ]
            ]
        ]);
        $data = array_merge([
            'dataProvider' => $dataProvider,
            'type' => Yii::t('frontend', 'Tag {tag} related articles', ['tag'=>Html::encode($tag)]),

        ], Helper::getCommonInfos());
        return $this->render('/article/index', $data);
    }
}
