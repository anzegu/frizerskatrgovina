<?php

include_once 'connection.php';
 
$user = $_SESSION['user_id'];


$query4 = "SELECT kr.*, kr.ime AS krIme, s.tel as tel, s.* FROM kraji kr INNER JOIN saloni s ON kr.id = s.kraj_id INNER JOIN uporabniki u ON s.id = u.salon_id WHERE u.id = $user ";
    $result4 = mysqli_query($link, $query4) or die(mysqli_error($link));

    while ($row = mysqli_fetch_array($result4)) {
   
   $krIme=$row['krIme'];
   $posta=$row['posta'];
   $ime=$row['ime'];
   $naslov=$row['naslov'];
   $tel=$row['tel'];
    }

?>

<div class="ok to-animate">
    <h2 style="color: red">UREDI NASLOV</h2>
<form action="../uredi_profil_update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $user ?>" />
     Ime Kraja: <br>
    <input  type="text" name="krIme" value="<?php echo $krIme ?>" /><br>
  
  Poštna Številka: <br>
    <input   type="number" name="posta" value="<?php echo $posta ?>" /><br>
    
  Ime Salona:<br>
    <input  type="text" name="ime" value="<?php echo $ime ?>" /><br>
  
  Naslov: <br>
    <input  type="text" name="naslov" value="<?php echo $naslov ?>" /><br>
  
    Telefon:<br>
    <input   type="number" name="tel" value="<?php echo $tel ?>" /><br>
    
    
     <input type="submit" value="Vnesi" name="submit" />
    <input type="reset" value="Prekliči" />
</form>
</div>