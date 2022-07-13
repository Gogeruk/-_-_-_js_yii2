<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="mb-4">
        <?php if (!empty($model->getFiles()->one())) {
            echo Html::img(
                '/' . $model->getFiles()->one()->getAttribute('path'),
                ['class' => 'img-fluid', 'style' => 'max-width:20%;']
            );
        } ?>
    </div>

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
