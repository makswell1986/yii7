<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Sdmx2402Search $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sdmx2402-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Code') ?>

    <?= $form->field($model, 'Klassifikator') ?>

    <?= $form->field($model, 'Klassifikator_ru') ?>

    <?= $form->field($model, 'Klassifikator_en') ?>

    <?php // echo $form->field($model, 'pokazatel') ?>

    <?php // echo $form->field($model, 'god') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
