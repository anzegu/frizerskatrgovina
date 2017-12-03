<?php
ob_start();
//excel download----------------------------------------------------------------------------------------------------
$output = '';

$id = $_SESSION['user_id'];
    $sql = "select distinct r.st, r.id, k.id as kid, u.id as id, r.skupna_cena, r.datum, u.ime AS ime, s.ime AS sime, s.naslov from racuni r inner join kosarice k on k.id=r.kosarica_id inner join uporabniki u on u.id=k.uporabnik_id inner join izdelki_kosarice ik on k.id=ik.kosarica_id inner join izdelki i on i.id=ik.izdelek_id INNER JOIN saloni s ON s.id = u.salon_id where u.id=$id AND r.id = $rid"; 
    $result3 = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0)
    {
        
        $output .= '<table class="table" border="1">';
        while ($row = mysqli_fetch_array($result3))
        {
            $output .= '<tr>'
                    . '<th>Ime salona</th><td>'. $row["sime"].'</td>'
                    . '<th>Naslov salona</th><td>'. $row["naslov"].'</td>'
                    . '<th>Ime uporabnika</th><td>'. $row["ime"].'</td>'
                    . '<th>Stevilka racuna</th><td>'. $row["st"].'</td></tr>';
        $query2 = 'select i.ime as ikime , ik.kolicina, i.cena, s.url, r.id from izdelki_kosarice ik inner join kosarice k on k.id=ik.kosarica_id inner join izdelki i on i.id=ik.izdelek_id inner join racuni r on k.id=r.kosarica_id inner join slike s on i.id=s.izdelek_id where r.id="'.$rid.'"';
        $result2 = mysqli_query($link, $query2);
        while($rows2 = mysqli_fetch_assoc($result2)){
        echo '<tr><th><b>Izdelek: </b>'.$izdelek = $rows2['ikime'].' </th></tr>';   
            echo '<tr><td><b>Kolicina:</b> '.$kolicina = $rows2['kolicina']." </tr><tr><td> <b>Cena:</b> ". $cena = $rows2['cena'].' <td></tr>';
        }
        echo '<tr><td><b>Skupna cena:</b> '.$skupna_cena = $row['skupna_cena'].' </td></td>';
                    
        }
        $output .= '</table>';
        
        
        $filename= "kosarica".$_SESSION['rid'].".xls";
        $_SESSION['filename'] = $filename;
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=".$filename); 
        echo $output;
    }
    header("Refresh: 3; url=union/index.php");
    ob_flush();