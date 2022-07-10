<?php

namespace app\models;

use yii\db\ActiveRecord;

class ReviewAdditionalData extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'review_additional_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ip_address', 'user_agent'], 'required'],
            [['ip_address'], 'string'],
            [['ip_address'], 'ip'],
            [['user_agent'], 'string', 'max' => 255],
        ];
    }

    public function getCustomer()
    {
        return $this->hasOne(UserReview::class, ['id' => 'user_review_id']);
    }
}