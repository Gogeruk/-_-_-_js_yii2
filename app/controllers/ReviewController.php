<?php

namespace app\controllers;

use Yii;
use app\models\UserReviewSearch;
use app\models\UserReview;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


class ReviewController extends Controller
{


    public function behaviors()
    {
        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['post'],
//                ],
//            ],
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['create'],
//                'rules' => [
//                    [
//                        'allow' => true,
//                        'actions' => ['create'],
//                        'roles' => ['@'],
//                    ],
//                ],
//            ]
        ];
    }



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


//        print_r($_POST);



        if ($model->load(Yii::$app->request->post()) /*&& $model->save()*/) {

//        $model->id = rand(444, 99999);
//        $model->name = 'aaaaaaaaaaaa';
//        $model->email = 'aaaaaaaaaaaa@aaa.com';
//        $model->review = 'aaaaaaaaaaaa';
//        $model->rating = 2;
//        $model->advantage = 'aaaaaaaaaaaa';
//        $model->disadvantage = 'aaaaaaaaaaaa';
        $model->save();






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