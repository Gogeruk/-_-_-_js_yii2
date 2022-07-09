<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserReview */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userreview-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'email:email',
            'review',
            'rating',
            'advantage',
            'disadvantage',
        ],
    ]) ?>

</div>
