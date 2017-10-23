<?php
    require_once("includes/init.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head></head>
    <body>
        <?php
            if(isset($_SESSION["username"]))
            {
                echo "Hello, " . $_SESSION["username"] . "!";
            }
            else
            {
                echo "<a href=\"./login.php\">Sign in with Steam</a>";
            }
        ?>
    </body>
</html>

