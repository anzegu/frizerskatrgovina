<?php
    include_once 'connection.php';
    
    $id = $_GET['id'];
    $query = "UPDATE uporabniki SET potrjen=0 WHERE id = $id";
    mysqli_query($link, $query);
    header("Location: union/index.php?po=true#fh5co-explore");
    
    ?>