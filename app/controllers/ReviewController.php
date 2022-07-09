<?php

namespace app\controllers;

use Yii;
use app\models\UserReviewSearch;
use app\models\UserReview;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


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

        if ($model->load(Yii::$app->request->post()) /*&& $model->save()*/) {



            //
            ///
            //
//            echo '111111111111111111111111';


            $model->save();

//            $model->setna
//
//            var_dump($model);


            exit();
            echo '2222222222222222222';




            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    protected function findModel($id)
    {
        if (($model = UserReview::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}