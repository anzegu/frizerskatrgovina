<?php
    include_once 'connection.php';
    include_once 'session.php';


    
    $email = $_POST['e_mail'];
    $user_pass = $_POST['pass'];
    
    $query = sprintf("SELECT * FROM uporabniki WHERE e_mail = '$email' AND geslo = '$user_pass'",
        mysqli_real_escape_string($link, $email));
        $result = mysqli_query($link, $query);
        //echo $query;
    
    if (mysqli_num_rows($result) == 1) {
        // vse je ok
        $user = mysqli_fetch_array($result);
         $_SESSION['user_id'] = $user['id'];
         $_SESSION['ime'] = $user['ime'];
        $_SESSION['priimek'] = $user['priimek'];
        $_SESSION['potrjen'] = $user['potrjen'];

        header("Location: union/index.php");
    }
    else {
      
        //napaka v podatkih, preusmeritev nazaj
        //na login
        
        echo "napačni podatki";
    }
?>
