<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\LinkSorter;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserReviewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Reviews';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="review-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="m-3 border border-primary">
        <h1 class="m-3"><?= Html::encode('Create New') ?></h1>

        <?= Html::a('Create User Review', ['create'], ['class' => 'm-3 btn btn-success']) ?>
    </div>


    <?= $this->render('_search', ['model' => $searchModel]); ?>


    <div class = "m-3 border border-primary">
        <h1 class="m-3"><?= Html::encode('Display') ?></h1>
        <div class="m-3">
            <?= LinkSorter::widget([
                'sort' => $dataProvider->sort
            ]) ?>

            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_userreview',
                'pager' => [
                    'pagination' => $dataProvider->setPagination(['pageSize' => 25])
                ],
            ]); ?>
        </div>
    </div>


</div>
