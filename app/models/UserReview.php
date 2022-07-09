<?php

namespace app\models;

use yii\db\ActiveRecord;

class UserReview extends ActiveRecord
{
    public $id;
    public $name;
    public $email;
    public $review;
    public $rating;
    public $advantage;
    public $disadvantage;

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
            [['email'], 'unique']
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

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }
}