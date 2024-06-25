<?php
require_once './vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


Firebase\JWT\JWT::$leeway = 1000000;
// Keys to generate token
$publicKey = file_get_contents('../OpenSSLKeys/publickey.pem');
$privateKey = file_get_contents('../OpenSSLKeys/privatekey.pem');
// Current time plus 2 hours and 30 minutes (Token expiration time)
$iat = time() + 10000;
// Payload
$json = '{
 "name": "Name Test",
 "lastname": "Lastname Test",
 "id": "1234564789",
 "type_id": "cc",
 "email": "kaxoko6307@aosod.com",
 "password": "4465790n",
 "iat": ' . $iat. '
 }
';
$json_final = json_decode($json, true);
$jwt = JWT::encode($json_final, $privateKey, 'RS256');
echo 'Your token is ' . $jwt;

?>