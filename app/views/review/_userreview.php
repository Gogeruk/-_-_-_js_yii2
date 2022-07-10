<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

?>

<div class = "userrebiew m-3">

    <ul class="list-group m-3">
<!--        <li class="mb-1">--><?//= Html::encode($model->id) ?><!--</li>-->
        <li class="mb-1"><?= Html::encode($model->name) ?></li>
        <li class="mb-1"><?= HtmlPurifier::process($model->email) ?></li>
        <li class="mb-1"><?= Html::encode($model->review) ?></li>
        <li class="mb-1"><?= Html::encode($model->rating) ?></li>
        <li class="mb-1"><?= Html::encode($model->advantage)  ?></li>
        <li class="mb-1"><?= Html::encode($model->disadvantage) ?></li>
    </ul>

</div>