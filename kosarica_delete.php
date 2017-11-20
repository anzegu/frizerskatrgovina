<?php


 include_once 'connection.php';

 
$idk = $_POST['kosarica_id'];
$idi = $_POST['izdelek_id'];
$kolicina = $_POST['kolicina'];


 $query1 = "UPDATE izdelki SET kolicina = (kolicina + $kolicina) WHERE id = $idi";
    if (mysqli_query($link, $query1)) {
        //echo "New record created successfully";
    } else {
        echo "Error: " . $query1 . "<br>" . mysqli_error($link);
    }


  $query = "DELETE FROM izdelki_kosarice WHERE izdelek_id = $idi AND kosarica_id = $idk";
   mysqli_query($link, $query) or die(mysqli_error($link));
     
   
   header("Location: kosarica.php");
 