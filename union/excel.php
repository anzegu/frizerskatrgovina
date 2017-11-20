<?php
$connect = mysqli_connect("localhost", "root", "", "taborniki2017");
$output = '';
if (isset($_POST["export_excel"]))
{
    $sql = "SELECT * FROM uporabniki ORDER BY id";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0)
    {
        $output .= '<table class="table" border="1">'
                . '<tr>'
                . '<th>ID</th>'
                . '<th>Ime</th>'
                . '<th>Priimek</th>'
                . '<th>Email</th>'
                . '<th>Geslo</th>'
                . '<th>Tip</th>'
                . '</tr>';
        while ($row = mysqli_fetch_array($result))
        {
            $output .= '<tr>'
                    . '<td>'. $row["id"].'</td>'
                    . '<td>'. $row["ime"].'</td>'
                    . '<td>'. $row["priimek"].'</td>'
                    . '<td>'. $row["email"].'</td>'
                    . '<td>'. $row["geslo"].'</td>'
                    . '<td>'. $row["tip"].'</td>'
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

