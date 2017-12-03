<?php

    include_once 'connection.php';
    
      $kom_id = $_GET['kom_id'];
      $izdelek_id = $_GET['izdelek_id'];
     
    $query4 = "DELETE FROM komentarji WHERE id = $kom_id";
    mysqli_query($link, $query4);
    
    
     header("Location: union/index.php?id=$izdelek_id#fh5co-services");
    
        
          
        ?>