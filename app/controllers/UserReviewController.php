<?php

namespace app\controllers;

use app\models\UserReview;
use yii\web\Controller;
use yii\web\Response;


class UserReviewController extends Controller
{
    public $modelClass = 'app\models\UserReview';

    /**
     * @return Response
     */
    public function actionIndex() : Response
    {
        $userReview = UserReview::find()->all();
        return $this->asJson($userReview);
    }


    /**
     * @param int $id
     * @return Response
     */
    public function actionId(int $id) : Response
    {
        $userReview = UserReview::findOne($id);
        return $this->asJson($userReview);
    }


    /**
     * @param string $ip
     * @return Response
     */
    public function actionIp(string $ip) : Response
    {
        $userReview = UserReview::find()
            ->joinWith('reviewAdditionalData')
            ->where(['ip_address' => $ip])
            ->all()
        ;
        return $this->asJson($userReview);
    }
}
