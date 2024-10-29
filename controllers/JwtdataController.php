<?php

namespace app\controllers;


use sizeg\jwt\JwtHttpBearerAuth;
use Yii;
use yii\rest\Controller;

class JwtdataController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => JwtHttpBearerAuth::class,
            'optional' => [
                'login',
            ],
        ];

        return $behaviors;
    }

    
    /**
     * @return \yii\web\Response
     */
    public function actionData()
        {
            
        /* $getHeaders = serialize(Yii::$app->request->headers);
        $pattern = '/^Bearer\s+(.*?)$/';
        preg_match($pattern, $getHeaders, $matches);
        print_r($matches); */

        $headers = Yii::$app->request->headers;

        $accept = $headers->get('authorization');
        $mass=explode(" ",$accept);
        $token=$mass[1];
     
           


        
        $token = Yii::$app->jwt->getParser()->parse((string) $token); // Parses from a string
           
            $token->getHeaders(); // Retrieves the token header
            $token->getClaims(); // Retrieves the token claims
            
            echo $token->getHeader('jti'); // will print "4f1g23a12aa"
            echo $token->getClaim('iss'); // will print "http://example.com"
            echo $token->getClaim('uid'); // will print "1"
            echo $token->getClaim('id'); // will print "1"
            echo $token->getClaim('flag'); // will print "1"
            echo $token->getClaim('sub'); // will print "1"
            exit;


        return $this->asJson([
            'success' => true,
        ]);
    }
}