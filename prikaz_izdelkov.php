<?php
include_once 'union/oblika.php';
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         
    </head>
    <body >
    
<?php
include_once 'session.php';
include_once 'connection.php';

echo '<div style=";margin: -60px 25% 0 25%; text-align: center"><form method="post" action="prikaz_izdelkov.php"><input placeholder="Išči izdelek ..." type="text" name="search" style="height: 35px; width: 200px; padding: 5px; border: 3px solid grey; border-radius: 25px" required/></form></div>';
if(isset($_POST['search'])){
    $ime = $_POST['search'];
    $query = "SELECT i.id, i.ime, i.cena, i.akcijska_cena, s.url FROM izdelki i INNER JOIN slike s ON i.id=s.izdelek_id where i.ime like '%$ime%'";
}
else{

$query = "SELECT i.id, i.ime, i.cena, i.akcijska_cena, s.url FROM izdelki i INNER JOIN slike s ON i.id=s.izdelek_id"; 
}
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result)) {
 
   $id = $row['id'];
   
echo '<div>';
 echo '<div class= "product_box">';
   echo '<p>';
     if (isset($_SESSION['potrjen'])&&($_SESSION['potrjen']==1)){  
   echo '<a href="izdelek_delete.php?id='.$id.'" onclick="return confirm(\'Are you sure?\')">DELETE</a>';
   }
     echo '</p>';
   
   //echo '<td>'."<img src='".$row['url']."' width=250 heght=500 </td>";
    $url = $row['url'];
   echo "<p><a href=\"info.php?id=".$id."\"><img src=\"$url\" width=250 height=250/></a></p>";

   echo '<p>'.$row['ime'].'</td>';

   if ($row['akcijska_cena'] != null) {
       
      echo '<p>'."Redna cena:  ".'<strike class="strike">';
        echo $row['cena']."$".'</p>';
      echo '</strike>';
   echo '<p style="color: red">'."AKCIJSKA CENA: ".$row['akcijska_cena']."$".'</p>';
   }
   else
   {
        echo '<p>'."CENA: ".$row['cena']."$".'</p>';
        echo '<p>'.'<br>'.'</p>';
   }
   
   echo '<div class="gumb_vec">';
   echo '<div class="gumb_vec1">';
    echo'<a href="info.php?id='.$id.'" class="btn btn-select-plan btn-sm">VEČ</a>';
   echo '</div>';
   echo '</div>';
   
   ?>
        <?php if (isset($_SESSION['potrjen'])&&($_SESSION['potrjen']==1)){ ?>
            <p>
                 <form action="akcijska_cena.php" method="post">
       <input type="hidden" name="id" value=<?php echo $id; ?> />
       <input   type="number" name="popust" placeholder="Vnesite popust v %"/><br />
       <input type="submit" value="Posodobi" name="submit" />
       <input type="reset" value="Prekliči" />
       <input type="submit" value="Izbriši Akcijsko Ceno" name="delete" />
            </form>
            </p>
            
            <?php
            }
     ?>
            <?php
            
           
         echo '</div>';
         echo '</div>';
}


?>
       
       <?php
            
 if(!empty($_GET['opozorilo'])) {
    $opozorilo = $_GET['opozorilo'];
    echo "<script type='text/javascript'>alert('Za ogled se prijavi!')</script>";
}

?>
   
    </body>
</html>