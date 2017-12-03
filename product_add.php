<?php

         include_once 'connection.php';
         
         
 if (isset($_SESSION['potrjen'])&&($_SESSION['potrjen']==1)) 
                                             {
?>

<div class="ok to-animate">
<form action="../product_insert.php" method="post" enctype="multipart/form-data">
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
    echo '<p><a class="btn btn-select-plan btn-sm" style="color: white; background-color: #1fb5f6" href="index.php?dk=true#fh5co-trusted">Dodaj kategorijo</a></p>';
    $query = "SELECT * FROM kategorije ";
    $result = mysqli_query($link, $query);
    $row=  mysqli_num_rows($result);
   while ($row = mysqli_fetch_array($result)) {

       echo "<input type='checkbox' required='required' name='kategorije[]' value='".$row['id']."'>"
        .$row['ime']." &nbsp";
       
   }
        
    ?>
    </p>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="ok to-animate">

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

<?php
                                             }
                                             
                                             
 else 
 {
      header("Location: prikaz_izdelkov.php");
 }
 
 ?>