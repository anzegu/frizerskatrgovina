<?php

include_once 'connection.php';
include_once 'session.php';

$user_id = $_SESSION['user_id'];

$query = "SELECT k.id FROM kosarice k INNER JOIN izdelki_kosarice ik ON k.id=ik.kosarica_id INNER JOIN izdelki i ON i.id = ik.izdelek_id WHERE uporabnik_id = $user_id"; 
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result)) {
   

}