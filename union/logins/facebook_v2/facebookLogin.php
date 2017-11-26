<?php
                    # Autoload the required files
                    require_once 'vendor/autoload.php';
                    # Set the default parameters
                    $fb = new Facebook\Facebook([
                      'app_id' => '143417102970655',
                      'app_secret' => '0693cc16699f75bc8eee1d4047eda1d0',
                      'default_graph_version' => 'v2.10',
                    ]);
	$redirect = 'http://localhost/frizerskatrgovina/prikaz_izdelkov.php';


	# Create the login helper object
	$helper = $fb->getRedirectLoginHelper();

	# Get the access token and catch the exceptions if any
	try {
	  $accessToken = $helper->getAccessToken();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  // When Graph returns an error
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  // When validation fails or other local issues
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}

	# If the 
	if (isset($accessToken)) {
	  	// Logged in!
	 	// Now you can redirect to another page and use the
  		// access token from $_SESSION['facebook_access_token'] 
  		// But we shall we the same page

		// Sets the default fallback access token so 
		// we don't have to pass it to each request
		$fb->setDefaultAccessToken($accessToken);

		try {
		  $response = $fb->get('/me?fields=email,name');
		  $userNode = $response->getGraphUser();
		}catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}

		$_SESSION['FaceName'] = $userNode->getName();
		$_SESSION['FaceEmail'] = $userNode->getProperty('email');
                $image = 'https://graph.facebook.com/'.$userNode->getId().'/picture?width=200';
		$_SESSION['FaceImage'] = $image;
                
                //REGISTER--------------------------------------
                require 'connection.php';
                $check = "SELECT * FROM uporabniki WHERE e_mail = '".$_SESSION['FaceEmail']."';";
                $result = mysqli_query($link, $check);
                $st = mysqli_num_rows ($result);
                if ($st == 0)
                {
                $sql = "INSERT INTO uporabniki (ime, e_mail) ".
                       "VALUES ('".$_SESSION['FaceName']."', '".$_SESSION['FaceEmail']."');";   
                $result = mysqli_query($link, $sql);
                }
		header("Location: prikaz_izdelkov.php");
	}else{
		$permissions  = ['email'];
		$loginUrl = $helper->getLoginUrl($redirect,$permissions);
		$_SESSION['loginURL'] = $loginUrl;
	}

