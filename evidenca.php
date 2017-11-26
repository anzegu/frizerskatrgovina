<?php
include_once 'connection.php';
include_once 'union/oblika.php';
include_once 'session.php';

if(isset($_SESSION['potrjen'])&&$_SESSION['potrjen']==1){
echo '<div style=";margin: -60px 25% 0 25%; text-align: center"><form method="post" action="evidenca.php"><input placeholder="Išči uporabnika ..." type="text" name="search" style="height: 35px; width: 200px; padding: 5px; border: 3px solid grey; border-radius: 25px" required/></form></div>';
echo '<div style="margin: 0 25% 0 25%; text-align: center;">';
if(isset($_POST['search'])){
    $ime = $_POST['search'];
    $result = mysqli_query($link, "select id, ime from uporabniki where ime like '%$ime%' order by ime");
    $row = mysqli_num_rows($result);
    if($row!=0){
        while($rows = mysqli_fetch_assoc($result)){
            $id=$rows['id'];
            echo "<a href='u_racun.php?id=$id'>".$ime = $rows['ime']."</a><br>";              
        } 
    }else{ 
            echo '<h1 style="color: red; text-align: center;">Ni najdenih izdelkov</h1>';
    header("Refresh: 3; url=evidenca.php");
    }
echo '</div>';
}else{
$result = mysqli_query($link, "select id, ime from uporabniki order by ime");
$row = mysqli_num_rows($result);
    if($row!=0){
        while($rows = mysqli_fetch_assoc($result)){
            $id=$rows['id'];
            echo "<a href='u_racun.php?id=$id'>".$ime = $rows['ime']."</a><br>";              
        } 
    }
echo '</div>';
}
}else{
    header("Location: prikaz_izdelkov.php");
}