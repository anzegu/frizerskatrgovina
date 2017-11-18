<?php

include_once 'connection.php';
include_once 'session.php';

$user_id = $_SESSION['user_id'];

echo '<table>';

$query = "SELECT k.id, k.skupna_cena, k.status FROM kosarice k WHERE uporabnik_id = $user_id AND status = 0";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result)) {
   $kosarica_id = $row['id'];
   $skupna_cena = $row['skupna_cena'];
   $status = $row['status'];

}

if ($status==0)
{
$query = "SELECT ik.*, i.*, i.id AS izdelek_id, s.*, ik.kolicina AS ikkol FROM izdelki_kosarice ik INNER JOIN izdelki i ON ik.izdelek_id = i.id INNER JOIN slike s ON i.id=s.izdelek_id WHERE ik.kosarica_id = $kosarica_id";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$rez = 0;
while ($row = mysqli_fetch_array($result)) {
   
    $izdelek_id = $row['izdelek_id'];

    
   echo '<tr>';
   echo '<td>'."<img src='".$row['url']."' width=250 heght=500 </td>";
   echo '</tr>';
   
   echo '<tr>';
   echo '<td>'."IME: ".$row['ime'].'</td>';
   echo '</tr>';
   
   echo '<tr>';
   echo '<td>'."CENA: ".$row['cena']."$".'</td>';
   echo '</tr>';
   
   $cena = $row['cena'];
   $kolicina = $row['ikkol'];

   
  // $rez=$rez+($cena*$kolicina);
  
   
   echo '<tr>';
   if ($row['akcijska_cena'] != null) {
   echo '<td>'."AKCIJSKA CENA: ".$row['akcijska_cena']."$".'</td>';
    $akcijska_cena = $row['akcijska_cena'];
   $rez=$rez+($akcijska_cena*$kolicina);
   }
   else
   {
       $rez=$rez+($cena*$kolicina);
   }
   echo '</tr>';
   
   
   echo '<tr>';
   echo '<td>'."KOLICINA: ".$row['ikkol'].'</td>';
   echo '</tr>';
   
}


$query = "SELECT k.skupna_cena FROM kosarice k WHERE uporabnik_id = $user_id AND status = 0";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    while ($row = mysqli_fetch_array($result)) {
    $skupna_cenaa = $row['skupna_cena'];

}
     echo '<tr>';
   echo '<td>'."SKUPAJ: ".$skupna_cenaa."$".'</td>';
   echo '</tr>';  

   
     echo '<tr>';
   echo '<td>NASLOV DOSTAVE</td>';
   echo '</tr>';  
   
   
$query4 = "SELECT kr.*, kr.ime AS krIme, s.* FROM kraji kr INNER JOIN saloni s ON kr.id = s.kraj_id INNER JOIN uporabniki u ON s.id = u.salon_id";
    $result4 = mysqli_query($link, $query4) or die(mysqli_error($link));

    while ($row = mysqli_fetch_array($result4)) {
   
        
   echo '<tr>';
   echo '<td>'.$row['krIme'].'</td>';
   echo '</tr>';  
   
   echo '<tr>';
   echo '<td>'.$row['posta'].'</td>';
   echo '</tr>';  
   
   echo '<tr>';
   echo '<td>'.$row['ime'].'</td>';
   echo '</tr>'; 
   
   echo '<tr>';
   echo '<td>'.$row['naslov'].'</td>';
   echo '</tr>'; 
   
   echo '<tr>';
   echo '<td>'.$row['tel'].'</td>';
   echo '</tr>'; 

}  
   
   
   
echo '</table>';
    

     echo "<a href='kosarica.php'>NAZAJ</a></br>";
     
    echo '<tr>';
   echo '<td>';
   echo '<form method="post" action="zakljucek.php">';
   //echo '<input type="hidden" name="izdelek_id" value="'.$izdelek_id.'">';
   echo '<input type="hidden" name="skupna_cenaa" value="'.$skupna_cenaa.'">';
   echo '<input type="hidden" name="kolicina" value="'.$kolicina.'">';
   echo '<input type="submit" name="submit" value="ODDAJ NAROČILO">';
   echo '</form>';
   echo '</td>';
   echo '</tr>';
   
}
