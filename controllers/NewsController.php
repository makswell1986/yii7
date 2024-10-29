<?php
namespace app\controllers;

use app\models\Api;
use yii\rest\ActiveController;

class NewsController extends ActiveController
{
    public $modelClass = 'app\models\api';
     

    public function actionSetview()
    {
        return ['1'=>'2'];
    }
 
}

?>