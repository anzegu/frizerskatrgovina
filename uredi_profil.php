<?php

include_once 'connection.php';
include_once 'union/oblika.php';
 
$user = $_GET['id'];


$query4 = "SELECT kr.*, kr.ime AS krIme, s.* FROM kraji kr INNER JOIN saloni s ON kr.id = s.kraj_id INNER JOIN uporabniki u ON s.id = u.salon_id WHERE u.id = $user ";
    $result4 = mysqli_query($link, $query4) or die(mysqli_error($link));

    while ($row = mysqli_fetch_array($result4)) {
   
   $krIme=$row['krIme'];
   $posta=$row['posta'];
   $ime=$row['ime'];
   $naslov=$row['naslov'];
   $tel=$row['tel'];
    }

?>

<div class="ok">
    <h1 style="color: red">UREDI NASLOV</h1>
<form action="uredi_profil_update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $user ?>" />
     <p>Ime Kraja: <br>
    <input  type="text" name="krIme" value="<?php echo $krIme ?>" />
  </p>
  <p>Poštna Številka: <br>
    <input   type="number" name="posta" value="<?php echo $posta ?>" />
    </p>
  <p>Ime Salona: <br>
    <input  type="text" name="ime" value="<?php echo $ime ?>" />
  </p>
  <p>Naslov: <br>
    <input  type="text" name="naslov" value="<?php echo $naslov ?>" />
  </p>
    <p>Telefon: <br>
    <input   type="number" name="tel" value="<?php echo $tel ?>" />
    </p>
    
     <input type="submit" value="Vnesi" name="submit" />
    <input type="reset" value="Prekliči" />
</div>