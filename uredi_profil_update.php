<?php
    include_once 'connection.php';
    
    $id = $_POST['id'];
    $krIme = $_POST['krIme'];
    $posta = $_POST['posta'];
    $ime = $_POST['ime'];
    $naslov = $_POST['naslov'];
    $tel = $_POST['tel'];
    
    $query = "UPDATE kraji k INNER JOIN saloni s ON k.id=s.kraj_id INNER JOIN uporabniki u ON s.id=u.salon_id SET k.ime = '$krIme', posta = '$posta' WHERE u.id = '$id';";
    mysqli_query($link, $query);
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    
    $query = "UPDATE saloni s INNER JOIN kraji k ON k.id=s.kraj_id INNER JOIN uporabniki u ON s.id=u.salon_id SET s.ime = '$ime', naslov = '$naslov', s.tel = '$tel' WHERE u.id = '$id';";
    mysqli_query($link, $query);
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    
    header("Location: profil.php?id=$id");
    
    ?>