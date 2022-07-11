<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="UserReview-form m-3">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 30]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'review')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'rating')->radioList( [1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four', 5 => 'five'] ) ?>
    <?= $form->field($model, 'advantage')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'disadvantage')->textInput(['maxlength' => 255]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'mb-4 btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
