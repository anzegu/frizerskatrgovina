<?php

include_once 'connection.php';
include_once 'session.php';

$id = $_POST['id'];
$kolicina = $_POST['kolicina'];


$query1 = "SELECT k.id FROM kosarice k WHERE uporabnik_id = '".$_SESSION['user_id']."'"; 
$result = mysqli_query($link, $query1) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result)) {
$kid = $row['id'];   
}

echo $query1;
        echo $kid;
if(mysqli_num_rows($result)==0){

 $query = "INSERT INTO kosarice (uporabnik_id, skupna_cena) 
                          VALUES ('".$_SESSION['user_id']."', NULL)";
 echo $query;
       
    if (mysqli_query($link, $query)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($link);
    }
    $kid=  mysqli_insert_id($link);
}
    
    $query2 = "INSERT INTO izdelki_kosarice (izdelek_id, kosarica_id, kolicina) 
                          VALUES ($id, $kid, $kolicina)";
       
    if (mysqli_query($link, $query2)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query2 . "<br>" . mysqli_error($link);
    }
    
    