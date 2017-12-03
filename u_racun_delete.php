<?php
include_once 'connection.php';
include_once 'session.php';

$id=$_GET['idizbris'];

$query = "delete from izdelki_kosarice where kosarica_id=(select id from kosarice where uporabnik_id=$id)";
$result = mysqli_query($link, $query);

$query = "delete from racuni r inner join kosarice k on k.id=r.kosarica_id where r.kosarica_id=(select id from kosarice where uporabnik_id=$id)";
$result = mysqli_query($link, $query);

$query = "delete from kosarice where uporabnik_id=$id";
$result = mysqli_query($link, $query);

$query = "delete from uporabniki where id=$id";
$result = mysqli_query($link, $query);

header("Location: union/index.php#fh5co-explore");

