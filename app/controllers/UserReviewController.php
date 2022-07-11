<?php

namespace app\controllers;

use app\models\UserReview;
use yii\web\Controller;


class UserReviewController extends Controller
{
    public $modelClass = 'app\models\UserReview';

    public function actionIndex()
    {
        $userReview = UserReview::find()->all();
        return $this->asJson($userReview);
    }
}
