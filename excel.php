<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "frizerskatrgovina");
$output = '';

$id = $_SESSION['user_id'];
if (isset($_POST["export_excel"]))
{
    $sql = "select distinct r.st, k.id as kid, u.id as id, r.skupna_cena, r.datum, u.ime AS ime, s.ime AS sime, s.naslov from racuni r inner join kosarice k on k.id=r.kosarica_id inner join uporabniki u on u.id=k.uporabnik_id inner join izdelki_kosarice ik on k.id=ik.kosarica_id inner join izdelki i on i.id=ik.izdelek_id INNER JOIN saloni s ON s.id = u.salon_id where u.id=1 order by r.datum"; 
    echo $sql;
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0)
    {
        $output .= '<table class="table" border="1">'
                . '<tr>'
                . '<th>Ime salona</th>'
                . '<th>Naslov salona</th>'
                . '<th>Ime uporabnika</th>'
                . '</tr>';
        while ($row = mysqli_fetch_array($result))
        {
            $output .= '<tr>'
                    . '<td>'. $row["sime"].'</td>'
                    . '<td>'. $row["naslov"].'</td>'
                    . '<td>'. $row["ime"].'</td>'
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

