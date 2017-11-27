<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "frizerskatrgovina");
$output = '';

$id = $_SESSION['user_id'];
$rid = $_SESSION['rid'];
if (isset($_POST["export_excel"]))
{
    $sql = "select distinct r.st, r.id, k.id as kid, u.id as id, r.skupna_cena, r.datum, u.ime AS ime, s.ime AS sime, s.naslov from racuni r inner join kosarice k on k.id=r.kosarica_id inner join uporabniki u on u.id=k.uporabnik_id inner join izdelki_kosarice ik on k.id=ik.kosarica_id inner join izdelki i on i.id=ik.izdelek_id INNER JOIN saloni s ON s.id = u.salon_id where u.id=$id AND r.id = $rid"; 
    echo $sql;
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0)
    {
        
        $output .= '<table class="table" border="1">'
                . '<tr>'
                . '<th>Ime salona</th>'
                . '<th>Naslov salona</th>'
                . '<th>Ime uporabnika</th>'
                . '<th>Številka računa</th>'
                . '<th>Datum računa</th>'
                . '<th>Ime izdelka</th>'
                . '</tr>';
        while ($row = mysqli_fetch_array($result))
        {
            $output .= '<tr>'
                    . '<th>Ime salona</th><td>'. $row["sime"].'</td>'
                    . '<th>Naslov salona</th><td>'. $row["naslov"].'</td>'
                    . '<th>Ime uporabnika</th><td>'. $row["ime"].'</td>'
                    . '<th>Številka računa</th><td>'. $row["st"].'</td>'
                    . '</tr>';
        }
        $output .= '</table>';
        $filename= "kosarica.xls";
        header("Content-Type: application/xls");
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        echo $output;
    }
}
?>
<?php 
/*
$kid = $rows['kid'];
        $st = $rows['st'];
        echo $datum = $rows['datum'];
        $query2 = 'select i.ime as ikime , ik.kolicina, i.cena, s.url from izdelki_kosarice ik inner join kosarice k on k.id=ik.kosarica_id inner join izdelki i on i.id=ik.izdelek_id inner join racuni r on k.id=r.kosarica_id inner join slike s on i.id=s.izdelek_id where ik.kosarica_id="'.$kid.'"';
        $result2 = mysqli_query($link, $query2);
        while($rows2 = mysqli_fetch_assoc($result2)){
        echo '<td>'.$izdelek = $rows2['ikime'];   
            echo $kolicina = $rows2['kolicina'].$cena = $rows2['cena'].'<td>;
        }
        echo $skupna_cena = $rows['skupna_cena']; */
