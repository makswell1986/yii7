<?php

use app\models\Log;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use kartik\export\ExportMenu;

/** @var yii\web\View $this */
/** @var app\models\LogSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Log', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?


$gridColumns = [
     
             'id',
            'log_time',
            'message',
            'request_body',
            
           
    
];

// Renders a export dropdown menu
echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'clearBuffers' => true, //optional
]);    
?>    
    
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'id',
                'content'=>function ($model){
                    return "<pre>".$model->id."</pre>";    
                },
               'contentOptions'=>['style'=>'width: 100px;']
               
                
            ],
            //'level',
            //'category',
            'log_time',
            //'prefix:ntext',
             [
                'attribute'=>'message',
                'content'=>function ($model){
                    return "<pre>".$model->message."</pre>";    
                },
               'contentOptions'=>['style'=>'max-width: 300px;']
               
                
            ],

            
            ['attribute'=>'request_body',
            'content'=>function ($model) {
                $content=base64_decode($model->request_body);
                return "<pre>".$content."</pre>";
            },
            'contentOptions'=>['style'=>'max-width: 300px;']
            
            ],
            
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Log $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
