<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * @property User $user
 * @property ReviewAdditionalData $reviewAdditionalData
 */
class UserReview extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'review', 'rating'], 'required'],
            [['name'], 'string', 'max' => 30],
            [['email', 'review', 'advantage', 'disadvantage'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['email'], 'unique'],

            // no html tags
            [
                ['review', 'advantage', 'disadvantage'],
                'match', 'not' => true, 'pattern' => '/<\/?[^>]*>/',
                'message' => 'HTML tags are not allowed'
            ],
        ];
    }


    /**
     * @return ActiveQuery
     */
    public function getUser() : ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'User_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getReviewAdditionalData() : ActiveQuery
    {
        return $this->hasOne(ReviewAdditionalData::class, ['user_review_id' => 'id']);
    }

//    /**
//     * @return ActiveQuery
//     */
//    public function getUploadForms() : ActiveQuery
//    {
//        return $this->hasMany(UploadForm::class, ['user_review_id' => 'id']);
//    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'name' => 'name',
            'email' => 'email',
            'review' => 'review',
            'rating' => 'rating',
            'advantage' => 'advantage',
            'disadvantage' => 'disadvantage',
        ];
    }
}