<?php

namespace app\models;

use yii\db\ActiveRecord;

class ReviewAdditionalData extends ActiveRecord
{
    public $id;
    public $ipAddress;
    public $userAgent;
    public $userReviewId;

    private static $userReviews = [
        '1' => [
            'id' => '1',
            'ip_address' => '8,8,8,8',
            'user_agent' => 'firefox',
            'user_review_id' => 1,
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }
}