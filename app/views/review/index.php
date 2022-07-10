<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserReviewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Reviews';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userreview-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_search', ['model' => $searchModel]); ?>

    <div class="m-3 border border-primary">
        <?= Html::a('Create User Review', ['create'], ['class' => 'm-3 btn btn-success']) ?>
    </div>

    <div class = "m-3 border border-primary">

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_userreview',
            'pager' => [
                'pagination' => $dataProvider->setPagination(['pageSize' => 25])
            ],
        ]); ?>



    </div>


</div>
