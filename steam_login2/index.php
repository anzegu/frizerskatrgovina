<?php
require 'SteamAuthentication/steamauth/steamauth.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Steam login</title>
    </head>
    <body>
    <?php   
    if (isset ($_SESSION['steamid']))
    {
        require 'SteamAuthentication/steamauth/userInfo.php';
        $id = $_SESSION['steamid'];?>
        <img src="<?php echo $steamprofile['avatar']?>" alt="slika"><br>
        <b><?php echo $steamprofile['personaname']?></b><br>
        <a href="logout.php">Logout</a><br>
    <?php }
    else {
        echo loginbutton();
         }?>
    </body>
</html>
