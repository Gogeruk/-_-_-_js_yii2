<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Reviews';

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::a('Reviews', ['review/index'], ['class'=>'mb-4 btn btn-danger']) ?>
    <?= Html::a('SOme other btn', ['review/index'], ['class'=>'mb-4 btn btn-warning']) ?>


</div>
