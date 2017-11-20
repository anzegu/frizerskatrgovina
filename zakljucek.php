<?php

include_once 'connection.php';
include_once 'session.php';

$user_id = $_SESSION['user_id'];

//$izdelek_id = $_POST['izdelek_id'];
$skupna_cena = $_POST['skupna_cenaa'];
//$kolicina = $_POST['kolicina'];


echo '<table>';

$query = "SELECT k.id  FROM kosarice k WHERE uporabnik_id = $user_id AND status = 0";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result)) {
   $kosarica_id = $row['id'];

}


$st = rand(100000, 999999);  //stevilka racuna

$query4 = "INSERT INTO racuni (kosarica_id, st, skupna_cena, datum) 
                          VALUES ('$kosarica_id', '$st', '$skupna_cena', NOW())";
       
    if (mysqli_query($link, $query4)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query4 . "<br>" . mysqli_error($link);
    }
    

$query = "UPDATE kosarice SET status = '1' WHERE id = $kosarica_id";
    
    
    if (mysqli_query($link, $query)) {
        //echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($link);
    }

    
header("Location: prikaz_izdelkov.php");