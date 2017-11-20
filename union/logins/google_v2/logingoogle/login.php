<?php
include "config.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login Facebook</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <style>
        .container{
            margin-top: 130px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control"/>
                            </div>
                            <button type="button" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <a href="oauth2callback.php" class="btn btn-danger btn-block">Register &amp; Login with Google</a>
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