<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '1032352997557-sg1uo5udp1d1da8cfnoo9b77sbsai0e0.apps.googleusercontent.com';
$clientSecret = 'MXQAAYHeF6PHJ3ALd2lciulw';
$redirectURL = 'http://localhost/frizerskatrgovina/google_login/';

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login GoogleAPI');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>

