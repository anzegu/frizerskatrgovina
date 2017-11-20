<?php
include "config.php";
if(isset($_POST['upload-photo'])){

    $photo = $_FILES['photo']['tmp_name'];

    $data = [
        'message' => $_POST['message'],
        'source' => $fb->fileToUpload($photo),
    ];

    $accessToken = $_SESSION['fb_access_token'];
      
    try {
        // Returns a `Facebook\FacebookResponse` object
        $response = $fb->post('/me/photos', $data, $accessToken);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
      
    $graphNode = $response->getGraphNode();      
      
    $info = 'Photo ID: ' . $graphNode['id'];
    header('Location: index.php?info='.$info);
}