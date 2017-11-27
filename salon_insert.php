<?php

include_once 'connection.php';
include_once 'session.php';


$user = $_SESSION['user_id'];

    $ime_kraja = $_POST['ime_kraja'];
    $ime_poste = $_POST['ime_poste'];
    $ime_salona = $_POST['ime_salona'];
    $naslov = $_POST['naslov'];
    $tel = $_POST['tel'];

    
     $query = "INSERT INTO kraji (ime, posta) 
                          VALUES ('$ime_kraja', '$ime_poste')";
       
    if (mysqli_query($link, $query)) {
         $last_id = mysqli_insert_id($link);
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($link);
    }
    
    
    
       $query2 = "INSERT INTO saloni (kraj_id, ime, naslov, tel) 
                          VALUES ('$last_id', '$ime_salona', '$naslov', '$tel')";
       
    if (mysqli_query($link, $query2)) {
         $last_salon_id = mysqli_insert_id($link);
        echo "New record created successfully";
    } else {
        echo "Error: " . $query2 . "<br>" . mysqli_error($link);
    }
    
    
    $query = "UPDATE uporabniki SET salon_id=$last_salon_id WHERE id = $user";
    mysqli_query($link, $query);
    
    header("Location: profil.php?id=$user_id");
    
    
    ?>
