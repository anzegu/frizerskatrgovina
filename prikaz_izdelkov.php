<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         
    </head>
    <body>
        <a href="product_add.php">Dodajanje izdelkov</a>
        
 <table> 
<?php
include_once 'connection.php';
$query = "SELECT i.id, i.ime, i.cena, i.akcijska_cena, s.url FROM izdelki i INNER JOIN slike s ON i.id=s.izdelek_id"; 
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result)) {
   $id = $row['id'];
   echo '<tr>';
   echo '<td>';
     //if (isset($_SESSION['admin'])&&($_SESSION['admin']==1)){ 
   echo '<a href="izdelek_delete.php?id='.$id.'" onclick="return confirm(\'Are you sure?\')">DELETE</a>';
   //}
     echo '</td>';
   echo '</tr>';
   
   echo '<tr>';
   echo '<td>'."<img src='".$row['url']."' width=250 heght=500 </td>";
   echo '</tr>';
   
   echo '<tr>';
   echo '<td>'."IME: ".$row['ime'].'</td>';
   echo '</tr>';
   
   echo '<tr>';
   echo '<td>'."CENA: ".$row['cena']."$".'</td>';
   echo '</tr>';
   
   echo '<tr>';
   if ($row['akcijska_cena'] != null) {
   echo '<td>'."AKCIJSKA CENA: ".$row['akcijska_cena']."$".'</td>';
   }
   echo '</tr>';
   
   ?>
     
       <tr>
            <td>
                 <form action="akcijska_cena.php" method="post">
       <input type="hidden" name="id" value=<?php echo $id; ?> />
       <input   type="number" name="popust" placeholder="Vnesite popust v %"/><br />
       <input type="submit" value="Posodobi" name="submit" />
       <input type="reset" value="Prekliči" />
       <input type="submit" value="Izbriši Akcijsko Ceno" name="delete" />
            </form>
            </td>
            </tr>
     
     
            <?php
   echo '<tr>';
   echo '<td>'."<a href='info.php?id=" . $id . "'>VEČ</a>".'</td>';
   echo '</tr>';
   
    
   
}

?>
</table>
    </body>
</html>