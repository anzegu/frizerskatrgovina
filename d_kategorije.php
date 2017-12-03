<?php
include_once 'connection.php';
?>
<form action="../d_k_i.php" method="post" enctype="multipart/form-data">
    <p>Ime Kategorije:</p>
     <input  type="text" name="ime" placeholder="vnesite ime ..." required="required" /><br />
     <p>Opis:</p>
     <textarea name="opis" rows="3" cols="25"></textarea><br /><br>
    <input type="submit" value="Vnesi" name="submit" />
    <input type="reset" value="Prekliči" />
</form>
    
    <p><a href="index.php">Prikaz izdelkov</a></p>
