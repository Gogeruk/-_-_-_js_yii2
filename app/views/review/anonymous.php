<?php

use yii\helpers\Html;

$this->title = 'User Reviews';
?>

<div class="userreview-anonymous m-3">
    <div class="m-3 border border-primary">
        <p class="m-3">
            name: <?= $author->name ?>
        </p>

        <p class="m-3">
            access_token: <?= $author->access_token ?>
        </p>
    </div>
</div>

