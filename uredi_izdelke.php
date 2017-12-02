<?php

include_once 'connection.php';
include_once 'union/oblika.php';
 
$id = $_GET['id'];

$query = "SELECT i.*, s.url FROM izdelki i INNER JOIN slike s ON i.id=s.izdelek_id WHERE i.id=$id"; 
$result = mysqli_query($link, $query) or die(mysqli_error($link));


while ($row = mysqli_fetch_array($result)) {
    $ime=$row['ime'];
    $opis=$row['opis'];
    $cena=$row['cena'];
    $kolicina=$row['kolicina'];
}


?>

<div class="ok">
    <h1 style="color: red">UREDI IZDELKE</h1>
<form action="uredi_izdelke_update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id ?>" />
     <p>Ime Izdelka: <br>
    <input  type="text" name="ime" value="<?php echo $ime ?>" />
  </p>
  <p>Opis Izdelka: <br>
     <textarea name="opis"  cols="50" rows="5"><?php echo $opis ?></textarea>
  </p>
     
  <p>Cena: <br>
    <input   type="number" name="cena" value="<?php echo $cena ?>" />
    </p>
    
    <p>Količina Izdelkov: <br>
    <input   type="number" name="kolicina_izdelkov" value="<?php echo $kolicina ?>" />
    </p>
    
    
     <input type="submit" value="Vnesi" name="submit" />
    <input type="reset" value="Prekliči" />
</div>