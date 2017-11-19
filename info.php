
<?php
include_once 'union/oblika.php';
?>

<table class="tabela_info">
<?php

include_once 'connection.php';
include_once 'session.php';

$user_id = $_SESSION['user_id'];
$id = $_GET['id'];

if( !isset($_SESSION["user_id"]) ){
    header("Location: prikaz_izdelkov.php?opozorilo=prijavi se ");
    exit();
}


$query1 = "SELECT i.id, k.ime FROM izdelki i INNER JOIN kategorije_izdelki ki ON i.id=ki.izdelek_id INNER JOIN kategorije k ON k.id=ki.kategorija_id WHERE i.id = $id "; 
$result1 = mysqli_query($link, $query1) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result1)) {
    $kategorije_izpis = $row['ime'];
}



$query = "SELECT i.ime, i.opis, i.cena, i.akcijska_cena, i.kolicina, s.url FROM izdelki i INNER JOIN slike s ON i.id=s.izdelek_id WHERE i.id = $id"; 
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result)) {
   
    $kolicina_izdelkov = $row['kolicina'];
    
      echo '<tr>';
   echo '<td>'.$row['ime'].'</td>';
   echo '</tr>';
    
   echo '<tr>';
   echo '<td class="info_td">'."<img src='".$row['url']."' width=250 heght=500 </td>";
   echo '<td class="info_td" colspan="2">'.$row['opis'].'</td>';
   echo '</tr>';
   
   echo '<tr>';
   echo '<td class=kategorije_izpis>';
   echo $kategorije_izpis;
   echo '</td>';
   echo '<td colspan="2" class="info1_td">';
  if ($row['akcijska_cena'] != null) {
       
      echo '<p>'."Redna cena:  ".'<strike class="strike">';
        echo $row['cena']."$".'</p>';
      echo '</strike>';
   echo '<p style="color: red">'."Akcijska cena: ".$row['akcijska_cena']."$".'</p>';
   }
   else
   {
        echo '<p>'."Redna cena: ".$row['cena']."$".'</p>';
        echo '<p>'.'<br>'.'</p>';
   }
   echo '</td>';
   echo '</tr>';
   
}

                echo '<tr>';
                echo '<form method="post" action="kosarica_insert.php">';
                echo '<input type="hidden" name="id" value="'.$id.'">';
                 echo '<input type="hidden" name="kolicina_izdelkov" value="'.$kolicina_izdelkov.'">';
                 echo '<td>'.'<input type="number" name = "kolicina" required="required">';
                echo  '<input type="submit" name="submit" value="Dodaj v košarico!">'.'</td>';
                echo '</form>';
                echo '</tr>';

                 
?>
    
    <?php
    if( isset($_SESSION["message"]) ){
    $messege = $_SESSION['message'];
    
    $_SESSION['message'];
    $_SESSION['message'] = null;
      
    
    echo '<tr>';
                 echo '<td>'.$messege.'</td>';
                 echo '</tr>';
    }
    ?>
    
    
    
    
    <?php
    $query = "SELECT k.id, k.skupna_cena, k.status FROM kosarice k WHERE uporabnik_id = $user_id";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    if(mysqli_num_rows($result)==0){

        
    }
    else
    {
        echo '<p class="kosarica">
                <a href="kosarica.php">
                    <img border="0" alt="kosarica" src="slike/Shopping-Cart-red.png" width="100" height="100">
                </a>
            </p>';
    }
?>
    

</table>