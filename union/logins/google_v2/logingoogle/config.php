<?php
require_once __DIR__.'/vendor/autoload.php';

session_start();

$client = new Google_Client();
$client->setApplicationName("Login with Google");
$client->addScope("https://www.googleapis.com/auth/plus.login");
$client->setAccessType("offline");
$client->setIncludeGrantedScopes(true);

$client->setHttpClient(new \GuzzleHttp\Client(array(
    'verify' => 'C:\xampp\htdocs\curl-ca-bundle.crt',
)));

$db = new PDO("mysql:host=localhost;dbname=loginsocial","root","");