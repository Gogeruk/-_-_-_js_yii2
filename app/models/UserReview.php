<?php

namespace app\models;

use yii\db\ActiveRecord;


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
        ];
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