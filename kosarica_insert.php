<?php

include_once 'connection.php';
include_once 'session.php';

$id = $_POST['id'];
$kolicina = $_POST['kolicina'];
$kolicina_izdelkov = $_POST['kolicina_izdelkov'];

$rez = $kolicina_izdelkov-$kolicina;
if ($rez<0)
{
$_SESSION['message'] = 'Preveč izdelkov!';
}
else
{
$query1 = "SELECT k.id, k.status FROM kosarice k WHERE uporabnik_id = '".$_SESSION['user_id']."'"; 
$result = mysqli_query($link, $query1) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result)) {
$kid = $row['id'];   
$status= $row['status']; 
}

if(mysqli_num_rows($result)==0){
 $query = "INSERT INTO kosarice (uporabnik_id, skupna_cena, status) 
                          VALUES ('".$_SESSION['user_id']."', NULL, 0)";
 echo $query;
       
    if (mysqli_query($link, $query)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($link);
    }
    
    
  $kid =  mysqli_insert_id($link);
    
}
else
{
    
$query1 = "SELECT k.status FROM kosarice k WHERE uporabnik_id = '".$_SESSION['user_id']."'"; 
$result = mysqli_query($link, $query1) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result)) { 
$status= $row['status']; 
}


if($status==1){

 $query = "INSERT INTO kosarice (uporabnik_id, skupna_cena, status) 
                          VALUES ('".$_SESSION['user_id']."', NULL, 0)";
 echo $query;
       
    if (mysqli_query($link, $query)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($link);
    }
    
    
  $kid =  mysqli_insert_id($link);
}
}


// pogleda ce je izdelek ze not ce je ga ne da not 
$query3 = "SELECT ik.izdelek_id, k.status FROM izdelki_kosarice ik INNER JOIN kosarice k ON k.id = ik.kosarica_id WHERE izdelek_id = $id AND status = 0";
$result3 = mysqli_query($link, $query3) or die(mysqli_error($link));
if(mysqli_num_rows($result3)==0){
    

    $query2 = "INSERT INTO izdelki_kosarice (izdelek_id, kosarica_id, kolicina) 
                          VALUES ($id, $kid, $kolicina)";
       
    if (mysqli_query($link, $query2)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query2 . "<br>" . mysqli_error($link);
    }
    
}
else
{
    echo "izdelek je že notri";
}

$query = "UPDATE izdelki SET kolicina = '$rez' WHERE id = $id";
    
    
    if (mysqli_query($link, $query)) {
        //echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($link);
    }



}
//header("Location: union/index.php#fh5co-pricing");
header("Location: union/index.php?id=$id#fh5co-services");