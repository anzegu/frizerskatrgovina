<?php 
include("../baza.php");
session_start();                
$name = $_SESSION['FaceName'];
$email = $_SESSION['FaceEmail'];

echo $name;
/*
//V bazo vstavi uporabnikovo ime in email
$sql = "INSERT INTO facebook_users (name, email) VALUES ('$name', '$email')";
$result = mysqli_query($con, $sql); */

