<?php

$username = 'root';
$password = '';
$database = 'frizerskatrgovina';
$server = 'localhost';

$link = mysqli_connect($server, $username, $password, $database);

/*
if ($link->connect_error) {
   die("Connection failed: " . $link->connect_error);
}
  echo "Connected successfully";

*/



mysqli_query($link, "SET NAMES 'utf8'");

?>