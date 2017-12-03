<?php

 include_once 'connection.php';

 
$id = $_GET['id'];


  $query = "DELETE FROM slike WHERE izdelek_id = $id";
  mysqli_query($link, $query) or die(mysqli_error($link));
  
   $query1 = "DELETE FROM kategorije_izdelki WHERE izdelek_id = $id";
   mysqli_query($link, $query1) or die(mysqli_error($link));
  
   $query2 = "DELETE FROM izdelki WHERE id = $id";
   mysqli_query($link, $query2) or die(mysqli_error($link));
   
   header("Location: union/index.php");
 