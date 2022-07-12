<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Reviews';

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="m-3 border border-primary">
        <div class="m-3 list-group">
            <?= Html::a('Create Anonymous User', ['review/anonymous'], ['class'=>'m-3 btn btn-sm btn-primary']) ?>
            <?= Html::a('Reviews', ['review/index'], ['class'=>'m-3 btn btn-sm btn-danger']) ?>
        </div>
    </div>

</div>
