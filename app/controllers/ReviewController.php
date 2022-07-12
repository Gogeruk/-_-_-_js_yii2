<?php

namespace app\controllers;

use app\models\ReviewAdditionalData;
use app\models\Author;
use Yii;
use app\models\UserReviewSearch;
use app\models\UserReview;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;


class ReviewController extends Controller
{
    /**
     * @var string
     */
    public $modelClass = 'app\models\UserReview';

    /**
     * @return string
     */
    public function actionIndex() : string
    {
        $searchModel = new UserReviewSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return string
     */
    public function actionAnonymous() : string
    {
        $author = new Author();

        $author->setAttribute('name', 'Anonymous');
        $author->setAttribute('access_token', (string) rand(1000000000, 9999999999));
        $author->save();

        return $this->render('anonymous', [
            'author' => $author
        ]);
    }


    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id): string
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    /**
     * @return string|Response
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
            return $this->render('_create', [
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