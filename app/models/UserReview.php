<?php

namespace app\models;

use PharIo\Manifest\Author;
use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * @property Author $author
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
    public function getAuthor() : ActiveQuery
    {
        return $this->hasOne(Author::class, ['id' => 'author_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getReviewAdditionalData() : ActiveQuery
    {
        return $this->hasOne(ReviewAdditionalData::class, ['user_review_id' => 'id']);
    }


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