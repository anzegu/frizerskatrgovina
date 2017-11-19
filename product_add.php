<?php
include_once 'union/oblika.php';
?>

         <?php
         include_once 'connection.php';
        ?>

<div class="ok">
    <h1 style="color: red">DODAJ IZDELKE</h1>
<form action="product_insert.php" method="post" enctype="multipart/form-data">
    <p>Ime Izdelka: <br>
    <input  type="text" name="ime" placeholder="vnesite ime ..." required="required" />
  </p>
  <p>Opis Izdelka: <br>
     <textarea name="opis" placeholder="vnesite opis ..." required="required" cols="50" rows="5"></textarea>
  </p>
     
  <p>Cena: <br>
    <input   type="number" name="cena" placeholder="Vnesite ceno ..."  required="required" />
    </p>
    
    <p>Količina Izdelkov: <br>
    <input   type="number" name="kolicina_izdelkov" placeholder="Vnesite kolicino ..."  required="required" />
    </p>
    
    <p> Izberite kategorije izdelka (več možnosti) <br>
    <?php
    
    $query = "SELECT * FROM kategorije ";
    $result = mysqli_query($link, $query);
      
   while ($row = mysqli_fetch_array($result)) {

       echo "<input type='checkbox' name='kategorije[]' value='".$row['id']."'>"
        .$row['ime']."</br>"."</br>";
       
   }
    ?>
    </p>
</div>

<div class="ok">

    <p>Izberi Sliko: <br>
      <input type="file" name="fileToUpload" id="fileToUpload"> <br />
    </p>
      
    <p>Opis Slike: <br>
       <input   type="text" name="opis_slike" placeholder="Vnesite opis slike ..." /><br /> <br />
    </p>
       
    <input type="submit" value="Vnesi" name="submit" />
    <input type="reset" value="Prekliči" />
</form>
</div>
