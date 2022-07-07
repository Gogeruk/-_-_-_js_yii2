<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserReview;


class UserReviewSearch extends UserReview
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'email', 'review', 'rating', 'advantage', 'disadvantage'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /***
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = UserReview::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 25
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'review', $this->review])
            ->andFilterWhere(['like', 'rating', $this->rating])
            ->andFilterWhere(['like', 'advantage', $this->advantage])
            ->andFilterWhere(['like', 'disadvantage', $this->disadvantage])
        ;

        return $dataProvider;
    }
}
