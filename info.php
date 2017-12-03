<?php
echo '<table class="tabela_info to-animate">';
include_once 'connection.php';
include_once 'session.php';

$user_id = $_SESSION['user_id'];
$id = $_GET['id'];

if( !isset($_SESSION["user_id"]) ){
    header("Location: prikaz_izdelkov.php?opozorilo=prijavi se ");
    exit();
}


$query1 = "SELECT i.id, k.ime FROM izdelki i INNER JOIN kategorije_izdelki ki ON i.id=ki.izdelek_id INNER JOIN kategorije k ON k.id=ki.kategorija_id WHERE i.id = $id "; 
$result1 = mysqli_query($link, $query1) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result1)) {
    $kategorije_izpis = $row['ime'];
}



$query = "SELECT i.id AS izdelek_id, i.ime, i.opis, i.cena, i.akcijska_cena, i.kolicina, s.url FROM izdelki i INNER JOIN slike s ON i.id=s.izdelek_id WHERE i.id = $id"; 
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result)) {
   
     $izdelek_id = $row['izdelek_id'];
    $kolicina_izdelkov = $row['kolicina'];
    
      echo '<tr>';
   echo '<td>'.$row['ime'].'</td>';
   if (isset($_SESSION['potrjen'])&&($_SESSION['potrjen']==1) || ($_SESSION['potrjen']==2))  
                  {
   echo '<td colspan="2" align="right">'.'<a href="index.php#fh5co-pricing"><img border="0" alt="kosarica" src="../slike/Shopping-Cart-red.png" width="100" height="100"></a>'.'</td>';
   echo '</tr>';
                  }
   echo '<tr>';
   echo '<td class="info_td">'."<img src='../".$row['url']."' width=250 heght=500 </td>";
   echo '<td class="info_td" colspan="2">'.$row['opis'].'</td>';
   echo '</tr>';
   
   echo '<tr>';
   echo '<td class=kategorije_izpis>';
   echo $kategorije_izpis;
   echo '</td>';
   echo '<td colspan="2" class="info1_td">';
  if ($row['akcijska_cena'] != null) {
       
      echo '<p>'."Redna cena:  ".'<strike class="strike">';
        echo $row['cena']."$".'</p>';
      echo '</strike>';
   echo '<p style="color: red">'."Akcijska cena: ".$row['akcijska_cena']."$".'</p>';
   }
   else
   {
        echo '<p>'."Redna cena: ".$row['cena']."$".'</p>';
        echo '<p>'.'<br>'.'</p>';
   }
   echo '</td>';
   echo '</tr>';
   
   echo '<tr>';
   echo '<td>';
   if($kolicina_izdelkov<=10 && $kolicina_izdelkov!=0)
   {
   echo '<p style="color: red">'."Na zalogi samo še: ".$kolicina_izdelkov.'</p>';
   }
   elseif ($kolicina_izdelkov==0)
   {
       echo '<p style="color: red">'."Izdelek trenutno ni na voljo!".'</p>';
   }
   else
   {
       echo '<p>'."Na voljo".'</p>';
   }
   echo '</td>';
   echo '</tr>';
   
    echo '<tr height="50px">';
   echo '<td>';
   
   echo '</td>';
   echo '</tr>';
}

        if($kolicina_izdelkov>=1)
        {
            if (isset($_SESSION['potrjen'])&&($_SESSION['potrjen']==1) || ($_SESSION['potrjen']==2))  
                  {
                echo '<tr>';
                echo '<form method="post" action="../kosarica_insert.php">';
                echo '<input type="hidden" name="id" value="'.$id.'">';
                 echo '<input type="hidden" name="kolicina_izdelkov" value="'.$kolicina_izdelkov.'">';
                 echo '<td>'.'<input type="number" name = "kolicina" required="required">';
                echo '<div class="gumb_vec">';
                echo '<div class="gumb_vec1">';
                echo  '<input class="btn btn-select-plan btn-sm" type="submit" name="submit" value="Dodaj v košarico!">'.'</td>';
                echo '</div>';
                echo '</div>';
                echo '</form>';
                echo '</tr>';
                  }
                  else
                  {
                       echo '<tr>';
                       echo '<td>';
                      echo "Za naročevanje izdelkov te mora potrditi Admin";
                      echo '</td>';
                       echo '</tr>';
                  }
        }

                 
?>
    
    <?php
    if( isset($_SESSION["message"]) ){
    $messege = $_SESSION['message'];
    
    $_SESSION['message'];
    $_SESSION['message'] = null;
      
    
    echo '<tr>';
                 echo '<td>'.$messege.'</td>';
                 echo '</tr>';
    }
    ?>
    
    
    
    
    <?php
    /*
    $query = "SELECT k.id, k.skupna_cena, k.status FROM kosarice k WHERE uporabnik_id = $user_id";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    if(mysqli_num_rows($result)==0){
        
    }
    else
    {
        echo '<p class="kosarica">
                <a href="kosarica.php">
                    <img border="0" alt="kosarica" src="slike/Shopping-Cart-red.png" width="100" height="100">
                </a>
            </p>';
    }
     * */
     
?>
    
    <tr>
        <td height="40px">
        </td> 
    </tr> 
    
    
    <tr> 
        <td>     
        <h3>Komentiraj</h3>
    <form action="comment_insert.php" method="post">
        <input type="hidden" name="izdelek_id" value="<?php echo $izdelek_id; ?>" />
        <textarea class="textarea_info" wrap="hard" name="content" cols="50" rows="5"></textarea>
        <br>
         <div class="gumb_vec">
        <div class="gumb_vec1">
        <input  class="btn btn-select-plan btn-sm" type="submit" value="Komentiraj" />
        </div>
        </div>
    </form>
        </td>
        
    </tr>
    

    <?php  
    
$query = "SELECT k.id, k.vsebina, k.datum, u.e_mail FROM komentarji k INNER JOIN uporabniki u ON u.id=k.upotabnik_id WHERE k.izdelek_id = $izdelek_id ORDER BY k.datum DESC";

 $result = mysqli_query($link, $query) or die(mysqli_error($link));
 while ($row = mysqli_fetch_array($result)){
 
    $kom_id=$row['id'];
   // echo $comm_id;
    
    echo '<tr>';
        echo '<td>';
            echo '<div style="font-size:90%">';
                echo $row['e_mail']."<br>";
            echo '</div>';
        echo '</td>';
    echo '</tr>';
     
    echo '<tr>';
        echo '<td>';
            echo '<div style="font-size:90%">';
                echo $row['datum']."<br>";
            echo '</div>';
        echo '</td>';
    echo '</tr>';
    
    echo '<tr>';
        echo '<td colspan="2">';
            echo '<div class="vsebina"; style="font-size:150%">';
   // echo $row['vsebina']."<br>";
                echo $row['vsebina'];
            echo '</div>';
        echo '</td>';
    echo '</tr>';
   
    echo '<tr>';
        echo '<td>';
            echo '<div class="komentarji_crtica">';
                if (isset($_SESSION['potrjen'])&&($_SESSION['potrjen']==1)){ 
                    echo "<a href = 'delete_comments.php?kom_id=$kom_id&izdelek_id=$izdelek_id'> DELETE </a>";
            echo '</td>';
    echo '</tr>';
   }
   
    echo '<tr height="40px">';
        echo '<td>';
        echo '</td>';
    echo '</tr>';
}
    ?>


 </table>