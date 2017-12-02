<?php
    include_once 'connection.php';
    
    $id = $_POST['id'];
    $ime = $_POST['ime'];
    $opis = $_POST['opis'];
    $cena = $_POST['cena'];
    $kolicina_izdelkov = $_POST['kolicina_izdelkov'];
    
    
    $query = "UPDATE izdelki SET ime = '$ime', opis = '$opis', cena = '$cena', kolicina = '$kolicina_izdelkov' WHERE id = '$id';";
    mysqli_query($link, $query);
    header("Location: prikaz_izdelkov.php");
    
    ?>