<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserReview */

$this->title = 'Create Review';
$this->params['breadcrumbs'][] = ['label' => 'UserReviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userreview-create">
    <div class="m-3 border border-primary">

        <h1 class="m-3"><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
