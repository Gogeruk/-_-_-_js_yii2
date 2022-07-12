<?php

use yii\helpers\Html;

$this->title = 'User Reviews';
?>

<div class="review-anonymous m-3">
    <div class="m-3 border border-primary">
        <p class="m-3">
            name: <?= $user->name ?>
        </p>

        <p class="m-3">
            access_token: <?= $user->access_token ?>
        </p>
    </div>
</div>

