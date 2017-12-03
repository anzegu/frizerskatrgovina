<?php
include_once 'connection.php';

$ime = $_POST['ime'];
if(isset($_POST['opis'])){
$opis = $_POST['opis'];
}else{
    $opis = NULL;
}

$query ="select * from kategorije where ime='$ime'";
$result = mysqli_query($link, $query);
$row=  mysqli_num_rows($result);
if($row!=0){
    echo 'Kategorije je že vpisana';
    header("Refresh:3; url=d_kategorije.php");
}else{
    $query ="insert into kategorije (ime, opis) values('$ime', '$opis')";
    if (mysqli_query($link, $query)) {
        echo "New category added successfully";
        header( "Refresh:3; url=union/index.php?dk=true#fh5co-trusted");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($link);
        header( "Refresh:3; url=union/index.php?dk=true#fh5co-trusted");
    }
}








?>