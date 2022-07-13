<?php

namespace app\controllers;

use app\models\ReviewAdditionalData;
use app\models\UploadForm;
use app\models\User;
use Yii;
use app\models\UserReviewSearch;
use app\models\UserReview;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;


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
        $user = new User();

        $user->username = 'anonymous';
        $user->setAttribute('username', 'anonymous');
        $user->setAttribute('password', 'anonymous');
        $user->setAttribute('access_token', (string) rand(1000000000, 9999999999));
        $user->save();

        return $this->render('anonymous', [
            'user' => $user
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
     * @return string|void
     */
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {

                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
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