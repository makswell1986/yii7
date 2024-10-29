<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Sdmx2402 $model */

$this->title = 'Create Sdmx2402';
$this->params['breadcrumbs'][] = ['label' => 'Sdmx2402s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdmx2402-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
