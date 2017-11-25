<?php
    include_once 'session.php';
    include_once 'connection.php';
    
    $user = $_SESSION['user_id'];
    $izdelek_id = $_POST['izdelek_id'];
    $content = $_POST['content'];
        
  
    
    $query = sprintf("INSERT INTO komentarji (upotabnik_id, izdelek_id, vsebina, datum) 
                      VALUES ($user, $izdelek_id,'%s',NOW())", 
                    mysqli_real_escape_string($link, $content));

    mysqli_query($link, $query);
    
    
 header("Location: info.php?id=$izdelek_id");
?>