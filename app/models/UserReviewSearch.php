<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;


class UserReviewSearch extends UserReview
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'review', 'rating', 'advantage', 'disadvantage'], 'safe'],
        ];
    }

    /**
     * @return array|array[]
     * @inheritdoc
     */
    public function scenarios() : array
    {
        return Model::scenarios();
    }

    /**
     * @param array $params
     * @return ActiveDataProvider
     * @inheritdoc
     */
    public function search($params)
    {
        $query = UserReview::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);


        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'review', $this->review])
            ->andFilterWhere(['like', 'rating', $this->rating])
            ->andFilterWhere(['like', 'advantage', $this->advantage])
            ->andFilterWhere(['like', 'disadvantage', $this->disadvantage])
        ;

        $query->joinWith(['reviewAdditionalData']);
        $dataProvider->setSort([
            'attributes' => [
                'review_additional_data.creation_date' => [
                    'asc' => ['creation_date' => SORT_ASC],
                    'default' => SORT_ASC
                ],
                'user_review.rating' => [
                    'asc' => ['rating' => SORT_ASC],
                    'default' => SORT_ASC
                ],
            ]
        ]);

        return $dataProvider;
    }
}
