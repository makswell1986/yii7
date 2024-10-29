<?

namespace app\controllers;

use Yii;
use yii\rest\Controller;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;



class FirejwtController extends Controller
{

public function actionData(){

    $keyPair = sodium_crypto_sign_keypair();

    echo $privateKey = base64_encode(sodium_crypto_sign_secretkey($keyPair));
    exit;


    
    $publicKey = base64_encode(sodium_crypto_sign_publickey($keyPair));
    
    $payload = [
        'iss' => 'example.org',
        'aud' => 'example.com',
        'iat' => 1356999524,
        'nbf' => 1357000000
    ];
    
    $jwt = JWT::encode($payload, $privateKey, 'EdDSA');
    echo "Encode:\n" . print_r($jwt, true) . "\n";
    
    $decoded = JWT::decode($jwt, new Key($publicKey, 'EdDSA'));
    echo "Decode:\n" . print_r((array) $decoded, true) . "\n";
}
}
?>