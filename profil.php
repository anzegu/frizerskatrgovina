<?php
    include_once 'connection.php';
    include_once 'session.php';
    
    $user = $_SESSION['user_id'];
    
$query3 = "SELECT * FROM uporabniki WHERE id=$user";
$result = mysqli_query($link, $query3) or die(mysqli_error($link));
while ($row = mysqli_fetch_array($result)) {
    $salon_id = $row['salon_id'];
}


if ($salon_id==NULL){

?>



<div class="ok to-animate">
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
     echo '<table class="tabela_info to-animate">';
    $query = "select *, u.ime as ime, s.ime as sime, u.tel as utel from uporabniki u inner join saloni s on s.id=u.salon_id where u.id=$user";
$result = mysqli_query($link, $query);
echo '<div style="text-align: center">';
while($rows = mysqli_fetch_assoc($result)){
    echo $ime = $rows['ime'].'<br>';
    echo $email = $rows['e_mail'].'<br>';
    echo $tel = $rows['utel'].'<br><br>';
    echo $sime = $rows['sime'].'<br>';
    echo $naslov = $rows['naslov'].'<br>';
    echo $utel = $rows['tel'].'<br><br><br>';
}
echo '</div>'; 

echo '</table>';
}
?>