<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserReviewSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userreview-search m-3 border border-primary ">
    <div class="m-3">

        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>

        <?= $form->field($model, 'name') ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'review') ?>

        <?= $form->field($model, 'rating') ?>

        <?= $form->field($model, 'advantage') ?>

        <?= $form->field($model, 'disadvantage') ?>



        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'mb-4 btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
