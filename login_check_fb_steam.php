<?php
    include_once 'connection.php';
    include_once 'session.php';
    
    if (isset($_SESSION['FaceName']))
    {
        $query = sprintf("SELECT * FROM uporabniki WHERE e_mail = '".$_SESSION['FaceEmail']."';",
        mysqli_real_escape_string($link, $_SESSION['FaceEmail']));
        $result = mysqli_query($link, $query);
        //echo $query;
    
    if (mysqli_num_rows($result) == 1) 
        {
        // vse je ok
        $user = mysqli_fetch_array($result);
         $_SESSION['user_id'] = $user['id'];
        $_SESSION['potrjen'] = $user['potrjen'];

        header("Location: prikaz_izdelkov.php");
    }
    }
    
    else if (isset($_SESSION['steamid']))
    {
        $query = sprintf("SELECT * FROM uporabniki WHERE ime = '".$_SESSION['steam_personaname']."';",
        mysqli_real_escape_string($link, $_SESSION['steam_personaname']));
        $result = mysqli_query($link, $query);
        //echo $query;
    
    if (mysqli_num_rows($result) == 1) 
        {
        // vse je ok
        $user = mysqli_fetch_array($result);
         $_SESSION['user_id'] = $user['id'];
        $_SESSION['potrjen'] = $user['potrjen'];

        header("Location: prikaz_izdelkov.php");
    }
    }
    