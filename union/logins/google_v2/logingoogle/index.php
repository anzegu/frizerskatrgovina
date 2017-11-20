<?php
include "config.php";

$client->setAuthConfig('client_secrets.json');

if(isset($_GET['code'])){
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
}

if(isset($_SESSION['access_token'])){
    $client->setAccessToken($_SESSION['access_token']);
    $plus_service = new Google_Service_Plus($client);
    $user = $plus_service->people->get('me');
    
    $id = $user['id'];
    $name = $user['displayName'];
    $first_name = $user['name']['givenName'];
    $last_name = $user['name']['familyName'];
    $email = $user['verified'];
    $link = $user['url'];
    $gender = $user['gender'];
    $locale = $user['language'];
    $picture = $user['image']['url'];
    $provider = 'google';
    $created = date("Y-m-d H:i:s");
    $modified = date("Y-m-d H:i:s");

    $stmt = $db->prepare("select * from users where oauth_uid=?");
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $datas = $stmt->fetch();
    if($datas['oauth_uid'] != $id){
        $stat = $db->prepare("insert into users values('',?,?,?,?,?,?,?,?,?,?,?)");
        $stat->bindParam(1, $provider);
        $stat->bindParam(2, $id);
        $stat->bindParam(3, $first_name);
        $stat->bindParam(4, $last_name);
        $stat->bindParam(5, $email);
        $stat->bindParam(6, $gender);
        $stat->bindParam(7, $locale);
        $stat->bindParam(8, $picture);
        $stat->bindParam(9, $link);
        $stat->bindParam(10, $created);
        $stat->bindParam(11, $modified);
        $stat->execute();
    } else{
        $stat = $db->prepare("update users set oauth_provider=?, first_name=?, last_name=?, email=?, gender=?, locale?, picture=?, link=?, modified=? where oauth_uid=?");
        $stat->bindParam(1, $provider);
        $stat->bindParam(2, $first_name);
        $stat->bindParam(3, $last_name);
        $stat->bindParam(4, $email);
        $stat->bindParam(5, $gender);
        $stat->bindParam(6, $locale);
        $stat->bindParam(7, $picture);
        $stat->bindParam(8, $link);
        $stat->bindParam(9, $modified);
        $stat->bindParam(10, $id);
        $stat->execute();
    }
    $stmt2 = $db->prepare("select * from users where oauth_uid=?");
    $stmt2->bindParam(1, $id);
    $stmt2->execute();
    $row2 = $stmt2->fetch();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login Facebook</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Login Facebook Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <a href="logout.php" class="btn btn-danger my-2 my-sm-0">Logout</a>
            </form>
        </div>
    </nav>
    <div class="container">
        <p><br/></p>
        <div class="row justify-content-md-center">
            <div class="col col-lg-4">
                <div class="card">
                    <img src="<?php echo $picture ?>" class="card-img-top"/>
                    <div class="card-body">
                        <h1 class="card-title"><?php echo $row2['first_name'] ?> <?php echo $row2['last_name'] ?></h1>
                        <div class="card-text">
                            <p>Gender: <?php echo $row2['gender'] ?></p>
                            <p>Languange: <?php echo $row2['locale'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
} else{
    header('Location: login.php');
}
?>