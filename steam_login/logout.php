<?php

    require_once("includes/init.php");
    session_unset();
    session_destroy();
    $auth->LogOut();

    header("Location: index.php");

?>

