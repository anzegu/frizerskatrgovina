<?php
include_once 'connection.php';

         
 if (isset($_SESSION['potrjen'])&&($_SESSION['potrjen']==1)) 
                                             {
?>


        <table border="2" class="potrditev">
            <tr>
                <td colspan="5" align="center" style="color: red;">
                    Potrdi uporabnika!
                </td>
            </tr>
    <tr>
        <td width="200px">ime</td>
        <td width="200px">priimek</td>
        <td width="200px">e-mail</td>
        <td width="200px">tel</td>
    </tr>

   
        <?php
        
        
        
$query = "SELECT * FROM uporabniki WHERE potrjen = 0 AND salon_id IS NOT NULL";
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_array($result)) {
    echo '<tr>';
    $id = $row['id'];
    echo '<td>'.$row['ime'].'</td>';
    echo '<td>'.$row['priimek'].'</td>';
    echo '<td>'.$row['e_mail'].'</td>';
    echo '<td>'.$row['tel'].'</td>';
    echo  "<td><a href='../uporabniki_potrditev.php?id=" . $id . "'>Potrdi</a></td>";
    echo '<tr>';
}
        ?>
        </table>



<?php
           }
           
            else 
 {
      header("Location: prikaz_izdelkov.php");
 }
    ?>
