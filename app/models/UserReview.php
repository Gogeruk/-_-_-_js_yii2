<?php

namespace app\models;

use yii\db\ActiveRecord;

1class UserReview extends ActiveRecord
{
    public $id;
    public $name;
    public $email;
    public $review;
    public $rating;
    public $advantage;
    public $disadvantage;

    private static $userReviews = [
        '1' => [
            'id' => '1',
            'name' => 'test',
            'email' => 'memail@mail.com'
            'review' => 'GOOD',
            'rating' => 1,
            'advantage' => null
            'disadvantage' => null,
        ],
    ];

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