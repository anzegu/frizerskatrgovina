<?php
include "config.php";
if(isset($_POST['upload-video'])){

    $video = $_FILES['video']['tmp_name'];
    
    $data = [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
    ];
      
    $accessToken = $_SESSION['fb_access_token'];
    
    try {
        $response = $fb->uploadVideo('me', $video, $data, $accessToken);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
    
    $info = 'Video ID: ' . $response['video_id'];
    header('Location: index.php?info='.$info);
}