<?php
include_once 'connection.php';
include_once 'session.php';

$user_id = $_SESSION['user_id'];

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
 echo '<div class = "product_box to-animate" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">';  
    $izdelek_id = $row['izdelek_id'];

    
   
   echo "<img src='../".$row['url']."' width=100 heght=100 ><br>";
   
   
   
   echo "IME: ".$row['ime'].'<br>';
   
   
   
   echo "CENA: ".$row['cena']."$".'<br>';
   
   
   $cena = $row['cena'];
   $kolicina = $row['ikkol'];

  // $rez=$rez+($cena*$kolicina);
  
   
   
   if ($row['akcijska_cena'] != null) {
   echo "AKCIJSKA CENA: ".$row['akcijska_cena']."$".'<br>';
    $akcijska_cena = $row['akcijska_cena'];
   $rez=$rez+($akcijska_cena*$kolicina);
   }
   else
   {
       $rez=$rez+($cena*$kolicina);
   }
   
   
   
   
   echo "KOLIČINA: ".$row['ikkol'].'<br>';
   
echo '</div>';
}


$query = "SELECT k.skupna_cena FROM kosarice k WHERE uporabnik_id = $user_id AND status = 0";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    while ($row = mysqli_fetch_array($result)) {
    $skupna_cenaa = $row['skupna_cena'];

}
   echo '<br><div style="clear:both; text-align: center">';  
   echo "SKUPAJ: ".$skupna_cenaa."$".'<br>';
   echo 'NASLOV DOSTAVE:<br>';
     
   
   $id = $_SESSION['user_id'];
$query4 = "SELECT kr.*, kr.ime AS krIme, s.* FROM kraji kr INNER JOIN saloni s ON kr.id = s.kraj_id INNER JOIN uporabniki u ON s.id = u.salon_id where u.id=$id";
    $result4 = mysqli_query($link, $query4) or die(mysqli_error($link));

    while ($row = mysqli_fetch_array($result4)) {
        
   
   echo $row['krIme'].'<br>';
     
   
   
   echo $row['posta'].'<br>';
     
   
   
   echo $row['ime'].'<br>';
    
   
   
   echo $row['naslov'].'<br>';
    
   
   
   echo $row['tel'].'<br>';
    

}  
   
   
   
    

     echo "<br><a href='kosarica.php'>NAZAJ</a><br><br>";
     
    
   
   echo '<form method="post" action="../zakljucek.php">';
   //echo '<input type="hidden" name="izdelek_id" value="'.$izdelek_id.'">';
   echo '<input type="hidden" name="skupna_cenaa" value="'.$skupna_cenaa.'">';
   echo '<input type="hidden" name="kolicina" value="'.$kolicina.'">';
    echo '<div class="gumb_vec">';
   echo '<div class="gumb_vec1">';
   echo '<input class="btn btn-select-plan btn-sm" type="submit" name="submit" value="ODDAJ NAROČILO">';
    echo '</div>';
   echo '</div>';
   echo '</form>';
   echo '</div>';
   echo '</div>';
}
