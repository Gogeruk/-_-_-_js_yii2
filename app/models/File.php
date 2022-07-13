<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class File extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file';
    }


    public function rules()
    {
        return [
            [['name', 'path'], 'safe'],
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getUserReview() : ActiveQuery
    {
        return $this->hasOne(UserReview::class, ['id' => 'user_review_id']);
    }
}