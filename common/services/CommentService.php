<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:05:52
 */
 


namespace common\services;


use backend\models\search\CommentSearch;
use common\models\Comment;

class CommentService extends Service implements CommentServiceInterface
{

    public function getSearchModel(array $options=[])
    {
        return new CommentSearch();
    }

    public function getModel($id, array $options = [])
    {
        return Comment::findOne($id);
    }

    public function newModel(array $options = [])
    {
        return new Comment();
    }

    /**
     * @param int $limit
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getRecentComments($limit = 10)
    {
        return $this->newModel()->find()->orderBy('created_at desc')->with('article')->limit($limit)->all();
    }

    public function getCommentCountByPeriod($startAt=null, $endAt=null)
    {
        $model = Comment::find();
        if( $startAt != null && $endAt != null ){
            $model->andWhere(["between", "created_at", $startAt, $endAt]);
        }else if ($startAt != null){
            $model->andwhere([">", "created_at", $startAt]);
        } else if($endAt != null){
            $model->andWhere(["<", "created_at", $endAt]);
        }
        return $model->count('id');
    }
}