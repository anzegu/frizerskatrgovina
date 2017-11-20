<?php
include_once 'union/oblika.php';
include_once 'connection.php';
?>
    <h1>DODAJ KATEGORIJE</h1>
<form action="d_k_i.php" method="post" enctype="multipart/form-data">
    <p>Ime Kategorije:</p>
     <input  type="text" name="ime" placeholder="vnesite ime ..." required="required" /><br />
     <p>Opis:</p>
     <textarea name="opis" rows="3" cols="25"></textarea><br /><br>
    <input type="submit" value="Vnesi" name="submit" />
    <input type="reset" value="Prekliči" />
</form>
    
    <p><a href="prikaz_izdelkov.php">Prikaz izdelkov</a></p>
