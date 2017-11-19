
         <?php
         include_once 'connection.php';
        ?>
    <h1>DODAJ IZDELKE</h1>
<form action="product_insert.php" method="post" enctype="multipart/form-data">
    <p>Ime Izdelka:</p>
     <input  type="text" name="ime" placeholder="vnesite ime ..." required="required" /><br />
    <p>Opis Izdelka:</p>
     <input   type="text" name="opis" placeholder="Vnesite opis ..." required="required" /><br />
    <p>Cena:</p>
    <input   type="number" name="cena" placeholder="Vnesite ceno ..."  required="required" /><br />
    
     <p>Količina Izdelkov:</p>
    <input   type="number" name="kolicina_izdelkov" placeholder="Vnesite kolicino ..."  required="required" /><br />
    <br><br>
    
    <p> Izberite kategorije izdelka (več možnosti) </p>
    <?php
    
    $query = "SELECT * FROM kategorije ";
    $result = mysqli_query($link, $query);
    $row=  mysqli_num_rows($result);
   while ($row = mysqli_fetch_array($result)) {

       echo "<input type='checkbox' required='required' name='kategorije[]' value='".$row['id']."'>"
        .$row['ime']."</br>"."</br>";
       
   }
        echo '<a href="d_kategorije.php">Dodaj kategorijo</a>';
    ?>
    
      <p>Izberi Sliko: </p>
      <input type="file" name="fileToUpload" id="fileToUpload"> <br />

      <p>Opis Slike: </p>
       <input   type="text" name="opis_slike" placeholder="Vnesite opis slike ..." /><br /> <br />

    <input type="submit" value="Vnesi" name="submit" />
    <input type="reset" value="Prekliči" />
</form>
    
    <p><a href="prikaz_izdelkov.php">Prikaz izdelkov</a></p>
