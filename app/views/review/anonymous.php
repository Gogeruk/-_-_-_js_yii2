<?php

use yii\helpers\Html;

$this->title = 'User Anonymous';
?>

<div class="review-anonymous m-3">
    <div class="m-3 border border-primary">

        <p class="m-3">
            name: <?= $user->getAttribute('username') ?>
        </p>

        <p class="m-3">
            access-token: <?= $user->getAttribute('access-token') ?>
        </p>
    </div>
</div>

