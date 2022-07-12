<?php

namespace app\controllers;

use app\models\User;
use Yii;
use app\models\ReviewAdditionalData;
use app\models\UserReview;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\web\Controller;
use yii\web\Response;


class UserReviewController extends Controller
{
    public $modelClass = 'app\models\UserReview';

    //
    //
    //
    // needs for post
    public $enableCsrfValidation = false;


    /**
     * @return array
     */
    public function behaviors() : array
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::class,
            'authMethods' => [
                HttpBearerAuth::class,
            ],
        ];

        return $behaviors;
    }


    /**
     * @return Response
     */
    public function actionCreate() : Response
    {
        //
        //
        //
        $aaa = new HttpBearerAuth();
        $user = User::findIdentityByAccessToken($request->post('access_token'));

//        $aaa->authenticate($user, Yii::$app->request, Yii::$app->response);



        $request = Yii::$app->request;

        $userReview = new UserReview;
        $userReview->setAttribute('name', $request->post('name'));
        $userReview->setAttribute('email', $request->post('email'));
        $userReview->setAttribute('review', $request->post('review'));
        $userReview->setAttribute('rating', $request->post('rating'));
        $userReview->setAttribute('advantage', $request->post('advantage'));
        $userReview->setAttribute('disadvantage', $request->post('disadvantage'));
        if (!$userReview->save()) {
            return $this->asJson($userReview->errors);
        }

        $userReviewData = new ReviewAdditionalData();
        $userReviewData->setAttribute('ip_address', Yii::$app->getRequest()->getUserIP());
        $userReviewData->setAttribute('user_agent', Yii::$app->getRequest()->getUserAgent());
        $userReviewData->setAttribute('creation_date', date("Y-m-d/H:i:s",time()));
        $userReviewData->setAttribute('user_review_id', $userReview->id);
        $userReviewData->save();

        return $this->asJson([$userReview, $userReviewData]);
    }


    /**
     * @return Response
     * @throws \yii\db\StaleObjectException
     */
    public function actionUpdate() : Response
    {
        $request = Yii::$app->request;

        $userReview = UserReview::findOne($request->post('id'));

        $userReview->setAttribute('name', $request->post('name'));
        $userReview->setAttribute('email', $request->post('email'));
        $userReview->setAttribute('review', $request->post('review'));
        $userReview->setAttribute('rating', $request->post('rating'));
        $userReview->setAttribute('advantage', $request->post('advantage'));
        $userReview->setAttribute('disadvantage', $request->post('disadvantage'));

        $userReview->update();
        if (!empty($userReview->errors)) {
            return $this->asJson($userReview->errors);
        }

        return $this->asJson($userReview);
    }


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
