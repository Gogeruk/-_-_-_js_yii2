<?php

namespace app\controllers;

use yii\rest\ActiveController;

class UserReviewController extends ActiveController
{
    public $modelClass = 'app\models\UserReview';

    public function actionIndex()
    {
        return $this->render('index');
    }
}
