<table>

<?php

include_once 'connection.php';

$id = $_GET['id'];

$query = "SELECT i.ime, i.opis, i.cena, i.akcijska_cena, s.url FROM izdelki i INNER JOIN slike s ON i.id=s.izdelek_id WHERE i.id = $id"; 
$result = mysqli_query($link, $query) or die(mysqli_error($link));

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
   
   echo '<tr>';
   if ($row['akcijska_cena'] != null) {
   echo '<td>'."AKCIJSKA CENA: ".$row['akcijska_cena']."$".'</td>';
   }
   echo '</tr>';
   
}

$query1 = "SELECT i.id, k.ime FROM izdelki i INNER JOIN kategorije_izdelki ki ON i.id=ki.izdelek_id INNER JOIN kategorije k ON k.id=ki.kategorija_id WHERE i.id = $id "; 
$result1 = mysqli_query($link, $query1) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result1)) {
      echo '<tr>';
   echo '<td>'."KATEGORIJE: ".$row['ime'].'</td>';
   echo '</tr>';
}


?>

</table>