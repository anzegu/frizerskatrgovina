<?php

include_once 'connection.php';
include_once 'session.php';

$user_id = $_SESSION['user_id'];


$query = "SELECT k.id, k.skupna_cena FROM kosarice k WHERE uporabnik_id = $user_id";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result)) {
   $kosarica_id = $row['id'];
   $skupna_cena = $row['skupna_cena'];

}

$query = "SELECT ik.*, i.*, s.*, ik.kolicina AS ikkol FROM izdelki_kosarice ik INNER JOIN izdelki i ON ik.izdelek_id = i.id INNER JOIN slike s ON i.id=s.izdelek_id WHERE ik.kosarica_id = $kosarica_id";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$rez = 0;
while ($row = mysqli_fetch_array($result)) {
   
    
   echo '<tr>';
   echo '<td>'."<img src='".$row['url']."' width=250 heght=500 </td>";
   echo '</tr>';
   
   echo '<tr>';
   echo '<td>'."IME: ".$row['ime'].'</td>';
   echo '</tr>';
   
   echo '<tr>';
   echo '<td>'."OPIS: ".$row['opis'].'</td>';
   echo '</tr>';
   
   echo '<tr>';
   echo '<td>'."CENA: ".$row['cena']."$".'</td>';
   echo '</tr>';
   
   $cena = $row['cena'];
   $kolicina = $row['ikkol'];

   
   $rez=$rez+($cena*$kolicina);
  
   
   echo '<tr>';
   if ($row['akcijska_cena'] != null) {
   echo '<td>'."AKCIJSKA CENA: ".$row['akcijska_cena']."$".'</td>';
   }
   echo '</tr>';
   
   echo '<tr>';
   echo '<td>'."KOLICINA: ".$row['kolicina'].'</td>';
   echo '</tr>';
   
   
   echo '<tr>';
   echo '<td>'."IME: ".$row['SKUPNA_CENA'].'</td>';
   echo '</tr>';
   
}

$query = "UPDATE kosarice SET skupna_cena = '$rez' WHERE uporabnik_id = $user_id";
    
    
    if (mysqli_query($link, $query)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($link);
    }
    
    echo $query;