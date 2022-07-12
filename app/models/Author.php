<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\db\ActiveQuery;


/**
 * @property UserReview[] $userReviews
 */
class AuthorReview extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 30],
            [['access_token'], 'string', 'max' => 30],
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getUserReviews() : ActiveQuery
    {
        return $this->hasMany(UserReview::class, ['author_id' => 'id']);
    }



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'name' => 'name',
            'access_token' => 'access_token'
        ];
    }
}