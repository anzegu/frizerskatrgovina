<?php

 include_once 'connection.php';

$popust = $_POST['popust'];
$id = $_POST['id'];


if (isset($_POST["submit"])){
$query1 = "SELECT i.cena FROM izdelki i WHERE id=$id"; 
$result1 = mysqli_query($link, $query1) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result1)) {
 $cena = $row['cena'];
    $akcijska_cena = $cena - ($cena * ($popust/100));
}

$query = "UPDATE izdelki SET akcijska_cena = $akcijska_cena WHERE id=$id";
   (mysqli_query($link, $query));
   
   header('Location: prikaz_izdelkov.php');
   
}
else if (isset($_POST["delete"])){

     $query3 = "UPDATE izdelki SET akcijska_cena = NULL WHERE id=$id";
    mysqli_query($link, $query3) or die(mysqli_error($link));
    header('Location: prikaz_izdelkov.php');
    
}
           
