<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Base $model */

$this->title = 'Update Base: ' . $model->id_num;
$this->params['breadcrumbs'][] = ['label' => 'Bases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_num, 'url' => ['view', 'id_num' => $model->id_num]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="base-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
