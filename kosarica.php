<?php

include_once 'connection.php';
include_once 'session.php';

$user_id = $_SESSION['user_id'];




echo '<table class="tabela_kosarica"  width="85%" border="0">';



$query = "SELECT k.id, k.skupna_cena, k.status FROM kosarice k WHERE uporabnik_id = $user_id";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result)) {
   $kosarica_id = $row['id'];
   $skupna_cena = $row['skupna_cena'];
   $status = $row['status'];

}

if ($status==0)
{
$query = "SELECT ik.*, i.*, i.id AS izdelek_id, s.*, ik.kolicina AS ikkol FROM izdelki_kosarice ik INNER JOIN izdelki i ON ik.izdelek_id = i.id INNER JOIN slike s ON i.id=s.izdelek_id WHERE ik.kosarica_id = $kosarica_id";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$rez = 0;
while ($row = mysqli_fetch_array($result)) {

    $izdelek_id = $row['izdelek_id'];
    
    //Ozbej koda----------------------
    echo '<tr><th>Slika izdelka</th><th>Ime izdelka</th><th></th><th>Cena izdelka</th></tr>';

    
   echo '<tr>';

   echo '<td width="300px">'."<img src='../".$row['url']."' width=100px heght=100px </td>";
 

   //echo '<td>'."<img src='../".$row['url']."' height=50px ></td>";
    echo '<td>'.'<p style="color: red">'.$row['ime'].'</p>'.'</td>';
 
  


   //echo '<td>'."CENA: ".$row['cena']."$".'<br>';
   
   
   $cena = $row['cena'];
   $kolicina = $row['ikkol'];
echo '<td width="50%">'." ".'</td>';
   
  // $rez=$rez+($cena*$kolicina);
  
   
   echo '<td class="info1_td">';
  if ($row['akcijska_cena'] != null) {
   echo '<p>'.$row['akcijska_cena']."$".'</p>';
   }
   else
   {
        echo '<p>'.$row['cena']."$".'</p>';
        
   }
   //echo '</td>';
   
 
   echo '<form method="post" action="../kosarica_delete.php">';
   echo '<input type="hidden" name="kosarica_id" value="'.$kosarica_id.'">';
   echo '<input type="hidden" name="izdelek_id" value="'.$izdelek_id.'">';
   echo '<input type="hidden" name="kolicina" value="'.$kolicina.'">';
   echo '<input type="submit" name="submit" value="ODSTRANI">';
   echo '</form>';
   echo '</td>';

   

   if ($row['akcijska_cena'] != null) {
    $akcijska_cena = $row['akcijska_cena'];
   $rez=$rez+($akcijska_cena*$kolicina);
   }
   else
   {
       $rez=$rez+($cena*$kolicina);
   }
   echo '</td>';
   echo '</tr>';
   
   echo '<tr>';
   echo '<td>'."KOLIČINA: ".$row['ikkol'].'</td>';
   echo '</tr>';
   
   


  

   /*
   echo '<tr>';
   echo '<td>'."SKUPNA CENA: ".$row['skupna_cena'].'</td>';
   echo '</tr>';
   */
  
    echo '<tr>';
   echo '<td id="td_border" colspan="4">';
    echo '</td>';
   echo '</tr>';
   
}


$query = "UPDATE kosarice SET skupna_cena = '$rez' WHERE uporabnik_id = $user_id AND status = 0";
    
    
    if (mysqli_query($link, $query)) {
        //echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($link);
    }
    
   // echo $query;
    
    
    
    $query = "SELECT k.skupna_cena FROM kosarice k WHERE uporabnik_id = $user_id AND status = 0";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    while ($row = mysqli_fetch_array($result)) {
    $skupna_cenaa = $row['skupna_cena'];

}
     echo '<tr>';
     echo '<td bgcolor="#F1FAFF">'." ".'</td>';
     echo '<td bgcolor="#F1FAFF">'."Za plačilo".'</td>';
   echo '<td bgcolor="#F1FAFF" colspan="4" id="td_skupna_cena">'.$skupna_cenaa."$".'</td>';
   echo '</tr>';  
   

echo '<tr>';
echo '<td bgcolor="#F1FAFF">'." ".'</td>';
 echo '<td bgcolor="#F1FAFF" >';
    
 echo '</td>';
 

 
   
     if ($skupna_cenaa == 0)
     {
         echo '
						<p>V KOŠARICI NIMATE IZDELKOV</p>';
     }
     else
     {
   
   echo '<td colspan="2"  style="text-align:right" bgcolor="#F1FAFF">';
   echo '<form method="post" action="index.php?sc=true">';
   //echo '<input type="hidden" name="izdelek_id" value="'.$izdelek_id.'">';
   echo '<input type="hidden" name="skupna_cenaa" value="'.$skupna_cenaa.'">';
   echo '<input type="hidden" name="kolicina" value="'.$kolicina.'">';
   echo '<div class="gumb_vec">';
   echo '<div class="gumb_vec1">';
    echo "<a href='#' data-nav-section='home'>Nadaljuj nakup</a>";
    echo ' &nbsp'.' &nbsp'.' &nbsp'.' &nbsp'.' &nbsp'.' &nbsp'.' &nbsp';
   echo '<input class="btn btn-select-plan btn-sm" type="submit" name="submit" value="POVZETEK NAROČILA">';
   echo '</div>';
   echo '</div>';
   echo '</form>';
   echo '</td>';
   echo '</tr>';
   
     }
     
     echo '</table>';
     }

else
{
    echo "V KOŠARICI NIMATE IZDELKOV";
}
