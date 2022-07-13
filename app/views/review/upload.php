<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $model app\models\UploadForm */
?>

<div class="m-3 border border-primary">
    <div class="m-3">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

        <div class="mb-4">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-sm btn-primary']) ?>
        <div>

    <?php ActiveForm::end() ?>

    <div>
<div>
