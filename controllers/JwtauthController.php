<?php

namespace app\controllers;

use sizeg\jwt\Jwt;
use Yii;
use yii\rest\Controller;

class JwtauthController extends Controller
{
    

    /**
     * @return \yii\web\Response
     */
    public function actionLogin()
    {
        /** @var Jwt $jwt */

        $jwt = Yii::$app->jwt;
        $signer = $jwt->getSigner('ES256');
  
      

        $key = $jwt->getKey('file://d:\OpenServer\domains\yii7\web\tokens\private.key');
      
        $time = time();

        
        // Adoption for lcobucci/jwt ^4.0 version
        $token = $jwt->getBuilder()
            ->issuedBy('http://example.com')// Configures the issuer (iss claim)
            ->permittedFor('http://example.org')// Configures the audience (aud claim)
            ->identifiedBy('4f1g23a12aa', true)// Configures the id (jti claim), replicating as a header item
            ->issuedAt($time)// Configures the time that the token was issue (iat claim)
            ->expiresAt($time + 3600)// Configures the expiration time of the token (exp claim)
            ->withClaim('uid', 100)// Configures a new claim, called "uid"
            ->withClaim('id', 'SDFSDF111')// Configures a new claim, called "uid"
            ->withClaim('flag', 'true')// Configures a new claim, called "uid"
            ->withClaim('sub', 'center')// Configures a new claim, called "uid"
            ->getToken($signer, $key); // Retrieves the generated token

        
      
            
        
            return $this->asJson([
            'token' => (string)$token,
        ]);
    }

   
   
}