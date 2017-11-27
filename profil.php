<?php
    include_once 'connection.php';
    include_once 'session.php';
    include_once 'union/oblika.php';
?>

<div class="ok">
    <h1 style="color: red">NAPIŠI KATEREMU SALONU PRIPADAŠ</h1>
<form action="salon_insert.php" method="post">
    <p>Ime Kraja: <br>
    <input  type="text" name="ime_kraja" placeholder="vnesite ime kraja ..." required="required" />
  </p>
  <p>Pošta: <br>
      <input  type="text" name="ime_poste" placeholder="vnesite pošto ..." required="required" />
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