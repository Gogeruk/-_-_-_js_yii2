<?php

namespace app\controllers;

use app\models\User;
use Yii;
use app\models\ReviewAdditionalData;
use app\models\UserReview;
use yii\web\Controller;
use yii\web\Response;


class UserReviewController extends Controller
{
    public $modelClass = 'app\models\UserReview';

    // needs for post
    // it's just a test
    public $enableCsrfValidation = false;

// does not work.
// no idea why...
//
//    public function behaviors() : array
//    {
//        $behaviors = parent::behaviors();
//        $behaviors['authenticator'] = [
//            'class' => CompositeAuth::class,
//            'authMethods' => [
//                HttpBasicAuth::class,
//                HttpBearerAuth::class,
//                QueryParamAuth::class,
//            ],
//        ];
//
//        return $behaviors;
//    }


    /**
     * @return Response
     */
    public function actionCreate() : Response
    {
        $user = User::findIdentityByAccessToken(
            Yii::$app->request->get('access_token')
        );

        $request = Yii::$app->request;

        if (!empty($user)) {
            $userReview = new UserReview;
            $userReview = $this->setUserReviewAttributes($userReview, $request);
            if (!$userReview->save()) {
                return $this->asJson($userReview->errors);
            }

            $userReviewData = new ReviewAdditionalData();
            $userReviewData->setAttribute('ip_address', Yii::$app->getRequest()->getUserIP());
            $userReviewData->setAttribute('user_agent', Yii::$app->getRequest()->getUserAgent());
            $userReviewData->setAttribute('creation_date', date("Y-m-d/H:i:s",time()));
            $userReviewData->setAttribute('user_review_id', $userReview->id);
            $userReviewData->save();

            return $this->asJson(['successfully created' => [$userReview, $userReviewData]]);
        }

        return $this->asJson(
            'access_token ' . Yii::$app->request->get('access_token') . ' is invalid.'
        );
    }


    /**
     * @return Response
     * @throws \yii\db\StaleObjectException
     */
    public function actionUpdate() : Response
    {

        $user = User::findIdentityByAccessToken(
            Yii::$app->request->get('access_token')
        );

        $request = Yii::$app->request;

        if (!empty($user)) {
            $userReview = UserReview::findOne($request->post('id'));

            if (empty($userReview)) {
                return $this->asJson(
                    'User review with id ' . $request->post('id') . ' was not found.'
                );
            }

            $userReview = $this->setUserReviewAttributes($userReview, $request);
            $userReview->update();
            if (!empty($userReview->errors)) {
                return $this->asJson($userReview->errors);
            }

            return $this->asJson(['successfully updated' => $userReview]);
        }

        return $this->asJson(
            'access_token ' . Yii::$app->request->get('access_token') . ' is invalid.'
        );
    }


    /**
     * @return Response
     */
    public function actionIndex() : Response
    {
        $user = User::findIdentityByAccessToken(
            Yii::$app->request->get('access_token')
        );

        if (!empty($user)) {
            $userReview = UserReview::find()->all();
            return $this->asJson($userReview);
        }

        return $this->asJson(
            'access_token ' . Yii::$app->request->get('access_token') . ' is invalid.'
        );
    }


    /**
     * @param int $id
     * @return Response
     */
    public function actionId(int $id) : Response
    {
        $user = User::findIdentityByAccessToken(
            Yii::$app->request->get('access_token')
        );

        if (!empty($user)) {
            $userReview = UserReview::findOne($id);

            if (empty($userReview)) {
                return $this->asJson(
                    'User review with id ' . $id . ' was not found.'
                );
            }

            return $this->asJson($userReview);
        }

        return $this->asJson(
            'access_token ' . Yii::$app->request->get('access_token') . ' is invalid.'
        );
    }


    /**
     * @param string $ip
     * @return Response
     */
    public function actionIp(string $ip) : Response
    {
        $user = User::findIdentityByAccessToken(
            Yii::$app->request->get('access_token')
        );

        if (!empty($user)) {
            $userReview = UserReview::find()
                ->joinWith('reviewAdditionalData')
                ->where(['ip_address' => $ip])
                ->all()
            ;

            if (empty($userReview)) {
                return $this->asJson(
                    'User review with ip ' . $ip . ' was not found.'
                );
            }

            return $this->asJson($userReview);
        }

        return $this->asJson(
            'access_token ' . Yii::$app->request->get('access_token') . ' is invalid.'
        );
    }


    /**
     * @return Response
     */
    public function actionAuthor() : Response
    {
        $user = User::findIdentityByAccessToken(
            Yii::$app->request->get('access_token')
        );

        if (!empty($user)) {
            $users = [];
            foreach (User::find()->all() as $user) {
                $users[] = $user->getAttribute('username');
            }

            return $this->asJson($users);
        }

        return $this->asJson(
            'access_token ' . Yii::$app->request->get('access_token') . ' is invalid.'
        );
    }


    /**
     * @param UserReview $userReview
     * @param $request
     * @return UserReview
     */
    public function setUserReviewAttributes(UserReview $userReview, $request) : UserReview
    {
        $userReview->setAttribute('name', $request->post('name'));
        $userReview->setAttribute('email', $request->post('email'));
        $userReview->setAttribute('review', $request->post('review'));
        $userReview->setAttribute('rating', $request->post('rating'));
        $userReview->setAttribute('advantage', $request->post('advantage'));
        $userReview->setAttribute('disadvantage', $request->post('disadvantage'));

        return $userReview;
    }
}
