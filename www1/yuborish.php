<?php //header('Content-Type: text/html; charset=utf-8');
$token="c9ba1c72851788698592f1e0e01d6518";
$okpo=$_GET['okpo'];




$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header' => 'Content-Type: application/x-www-form-urlencoded' . PHP_EOL

  ),
  "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    )
);

$context = stream_context_create($opts);

$file = file_get_contents('http://10.190.2.65:8080/sys/legal_entities/request_okpo?token=c9ba1c72851788698592f1e0e01d6518&okpo='.$okpo, false, $context);
$data = json_decode($file, true);
$statusCode=$data["statusCode"];
$statusMessage=$data["statusMessage"];
echo "<meta http-equiv='Refresh' content='0; URL=index.php?statusCode=$statusCode&statusMessage=$statusMessage'>";
?>

