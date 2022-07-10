<?php

namespace app\controllers;

use app\models\ReviewAdditionalData;
use Yii;
use app\models\UserReviewSearch;
use app\models\UserReview;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


class ReviewController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserReviewSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new UserReview();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $userReviewData = new ReviewAdditionalData();

            $userReviewData->setAttribute('ip_address', Yii::$app->getRequest()->getUserIP());
            $userReviewData->setAttribute('user_agent', Yii::$app->getRequest()->getUserAgent());
            $userReviewData->setAttribute('creation_date', date("Y-m-d/H:i:s",time()));
            $userReviewData->setAttribute('user_review_id', $model->id);
            $userReviewData->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    /**
     * @param $id
     * @return UserReview|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = UserReview::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}