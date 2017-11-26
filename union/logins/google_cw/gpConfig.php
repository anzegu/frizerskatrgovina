<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '689527563874-pu7trr4t5bt97mhlqtt13tco9lpk6gms.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'syugcZcqBJVCMVH-D2QunQTn'; //Google client secret
$redirectURL = 'http://localhost/frizerskatrgovina/union/logins/google_cw/'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to Frizerska trgovina');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>