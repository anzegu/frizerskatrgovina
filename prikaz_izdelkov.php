<?php
//include_once 'union/oblika.php';
?>


<?php
include_once 'session.php';
include_once 'connection.php';


echo '<br><br><br><br><div class="to-animate" style=";margin: -60px 25% 0 25%; text-align: center"><form method="post" action="index.php"><input placeholder="Išči izdelek ..." type="text" name="search" style="height: 35px; width: 200px; padding: 5px; border: 3px solid grey; border-radius: 25px" required/></form></div>';
echo '<div style="margin: 0 6% 6% 6%">';
if(isset($_POST['search'])){
    $ime = $_POST['search'];
    $query = "SELECT i.id, i.ime, i.cena, i.akcijska_cena, s.url FROM izdelki i INNER JOIN slike s ON i.id=s.izdelek_id where i.ime like '%$ime%'";
}
else{

$query = "SELECT i.id, i.ime, i.cena, i.akcijska_cena, s.url FROM izdelki i INNER JOIN slike s ON i.id=s.izdelek_id"; 
}
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_num_rows($result);
if($row==0){
    echo '<h1 class="to-animate" style="color: red; text-align: center;">Ni najdenih izdelkov</h1>';
    header("Refresh: 3; url=union/index.php");
}else{
while ($row = mysqli_fetch_array($result)) {
 
   $id = $row['id'];
   
echo '<div class="to-animate">';
 echo '<div class = "product_box to-animate" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">';
   echo '<p>';
     if (isset($_SESSION['potrjen'])&&($_SESSION['potrjen']==1)){  
   echo '<a href="izdelek_delete.php?id='.$id.'" onclick="return confirm(\'Are you sure?\')">DELETE</a>';
   echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp';
   echo '<a href="uredi_izdelke.php?id='.$id.'">UREDI</a>';
   }
     echo '</p>';
   
   //echo '<td>'."<img src='".$row['url']."' width=250 heght=500 </td>";
    $url = $row['url'];
   echo '<p><a href="index.php?id='.$id.'#fh5co-services"><img src="../'.$url.'" width="250" height="250"/></a></p>';

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
    echo'<a href="index.php?id='.$id.'#fh5co-services" class="btn btn-select-plan btn-sm">VEČ</a>';
   echo '</div>';
   echo '</div>';
   
   ?>
        <?php if (isset($_SESSION['potrjen'])&&($_SESSION['potrjen']==1)){ ?>
            <p>
                 <form action="akcijska_cena.php" method="post">
       <input type="hidden" name="id" value=<?php echo $id; ?> />
       <input   type="number" name="popust" min="1" max="99" placeholder="Vnesite popust v %"/><br />
       <input type="submit" value="Posodobi" name="submit" />
       <input type="reset" value="Prekliči" />
       <input type="submit" value="Izbriši Akcijsko Ceno" name="delete" />
            </form>
            </p>
            
            <?php
            }
         echo '</div>';
         echo '</div>';
}
?>
       
       <?php
            
 if(!empty($_GET['opozorilo'])) {
    $opozorilo = $_GET['opozorilo'];
    echo "<script type='text/javascript'>alert('Za ogled se prijavi!')</script>";
}

}
echo '</div>';