<?php

use app\models\Base;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BaseSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Bases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="base-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Base', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_num',
            'id',
            'type',
            'flag',
            'payload',
            //'action',
            //'request_datetime',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Base $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_num' => $model->id_num]);
                 }
            ],
        ],
    ]); ?>


</div>
