<?php
include_once 'connection.php';
include_once 'union/oblika.php';
include_once 'session.php';

$id = $_GET['id'];
echo '<div style="margin: 0 15% 0 15%">';

$query = "select *, u.ime as ime, s.ime as sime, u.tel as utel from uporabniki u inner join saloni s on s.id=u.salon_id where u.id=$id";
$result = mysqli_query($link, $query);
echo '<div style="text-align: center">';
while($rows = mysqli_fetch_assoc($result)){
    echo $ime = $rows['ime'].'<br>';
    echo $email = $rows['e_mail'].'<br>';
    echo $tel = $rows['tel'].'<br><br>';
    echo $sime = $rows['sime'].'<br>';
    echo $naslov = $rows['naslov'].'<br>';
    echo $utel = $rows['utel'].'<br><br><br>';
}
echo '</div>';

$query = "select distinct r.st, k.id as kid, u.id as id, r.skupna_cena, r.datum, u.ime from racuni r inner join kosarice k on k.id=r.kosarica_id inner join uporabniki u on u.id=k.uporabnik_id inner join izdelki_kosarice ik on k.id=ik.kosarica_id inner join izdelki i on i.id=ik.izdelek_id where u.id=$id order by r.datum"; 
$result = mysqli_query($link, $query);
$row = mysqli_num_rows($result);
if($row!=0){
    while ($rows = mysqli_fetch_assoc($result)){
        $kid = $rows['kid'];
        echo '<div class="product_box" style="width: 30%"><h2>'.$st = $rows['st'].'</h2><br>';
        echo '<h3>'.$datum = $rows['datum'].'</h3><br>';
        $query2 = 'select i.ime as ikime , ik.kolicina, i.cena, s.url from izdelki_kosarice ik inner join kosarice k on k.id=ik.kosarica_id inner join izdelki i on i.id=ik.izdelek_id inner join racuni r on k.id=r.kosarica_id inner join slike s on i.id=s.izdelek_id where ik.kosarica_id="'.$kid.'"';
        $result2 = mysqli_query($link, $query2);
        while($rows2 = mysqli_fetch_assoc($result2)){
        echo '<b><i>'.$izdelek = $rows2['ikime'].'</i></b> x';   
        echo $kolicina = $rows2['kolicina'].'<br>'.$cena = $rows2['cena'].'€<br>';
        echo '<img src="'.$slika = $rows2['url'].'" height="50px"><br>';
        }
        echo '<br><b>'.$skupna_cena = $rows['skupna_cena'].'€</b><br>';
        
        echo '</div>';        
    }
}
echo '</div>';