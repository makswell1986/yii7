<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Sdmx2402 $model */

$this->title = 'Update Sdmx2402: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sdmx2402s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sdmx2402-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
