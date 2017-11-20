<?php
include "config.php";
if(isset($_POST['post-link'])){
    $linkData = [
        'link' => $_POST['link'],
        'message' => $_POST['message'],
    ];

    $accessToken = $_SESSION['fb_access_token'];
      
    try {
        // Returns a `Facebook\FacebookResponse` object
        $response = $fb->post('/me/feed', $linkData, $accessToken);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
      
    $graphNode = $response->getGraphNode();
      
    $info = 'Posted with id: ' . $graphNode['id'];
    header('Location: index.php?info='.$info);
}