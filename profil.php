<?php
    include_once 'connection.php';
    include_once 'session.php';
    include_once 'union/oblika.php';
    
    $user = $_SESSION['user_id'];
    
$query3 = "SELECT * FROM uporabniki";
$result = mysqli_query($link, $query3) or die(mysqli_error($link));
while ($row = mysqli_fetch_array($result)) {
    $salon_id = $row['salon_id'];
}

if ($salon_id==NULL){

?>



<div class="ok">
    <h1 style="color: red">NAPIŠI KATEREMU SALONU PRIPADAŠ</h1>
<form action="salon_insert.php" method="post">
    <p>Ime Kraja: <br>
    <input  type="text" name="ime_kraja" placeholder="vnesite ime kraja ..." required="required" />
  </p>
  <p>Pošta: <br>
       <input   type="number" name="ime_poste" placeholder="Vnesite posto ..."  required="required" />
  </p>
     
  <p>Ime salona: <br>
     <input  type="text" name="ime_salona" placeholder="vnesite ime salona ..." required="required" />
    </p>
    
    <p>Naslov: <br>
     <input  type="text" name="naslov" placeholder="vnesite naslov ..." required="required" />
    </p>
    
    <p>Telefon: <br>
    <input   type="number" name="tel" placeholder="Vnesite telefon ..."  required="required" />
    </p>
     
    <input type="submit" value="Vnesi" name="submit" />
    <input type="reset" value="Prekliči" />
</form>
</div>


<?php
}

 else {
     echo '<table class="tabela_info">';
    $query4 = "SELECT kr.*, kr.ime AS krIme, s.* FROM kraji kr INNER JOIN saloni s ON kr.id = s.kraj_id INNER JOIN uporabniki u ON s.id = u.salon_id WHERE u.id = $user ";
    $result4 = mysqli_query($link, $query4) or die(mysqli_error($link));

    while ($row = mysqli_fetch_array($result4)) {
   
        
   echo '<tr>';
   
   echo '<td>'."Ime Kraja: ".$row['krIme'].'</td>';
   echo '</tr>';  
   
   echo '<tr>';
   echo '<td>'."Poštna Številka: ".$row['posta'].'</td>';
   echo '</tr>';  
   
   echo '<tr>';
   echo '<td>'."Ime Salona: ".$row['ime'].'</td>';
   echo '</tr>'; 
   
   echo '<tr>';
   echo '<td>'."Naslov: ".$row['naslov'].'</td>';
   echo '</tr>'; 
   
   echo '<tr>';
   echo '<td>'."Telefon: ".$row['tel'].'</td>';
   echo '</tr>'; 

}  

echo '<table>';
}
?>