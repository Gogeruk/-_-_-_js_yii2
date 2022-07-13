<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

6?>

<div class = "userrebiew m-3">

    <div class="mb-4">
        <?php if (!empty($model->getFiles()->one())) {
            echo Html::img(
                '/' . $model->getFiles()->one()->getAttribute('path'),
                ['class' => 'img-fluid', 'style' => 'max-width:5%;']
            );
        } ?>
    </div>

    <ul class="list-group m-3">
        <li class="mb-1">Id: <?= Html::encode($model->id) ?></li>
        <li class="mb-1">Name: <?= Html::encode($model->name) ?></li>
        <li class="mb-1">Email: <?= HtmlPurifier::process($model->email) ?></li>
        <li class="mb-1">Review: <?= Html::encode($model->review) ?></li>
        <li class="mb-1">Rating: <?= Html::encode($model->rating) ?></li>
        <li class="mb-1">Advantage: <?= Html::encode($model->advantage)  ?></li>
        <li class="mb-1">Disadvantage: <?= Html::encode($model->disadvantage) ?></li>
    </ul>

    <div class="mb-4">
        <?= Html::a('Upload UploadForm', ['upload', 'id' => $model->id], ['class' => 'mb-4 btn btn-sm btn-primary']) ?>
    </div>

</div>