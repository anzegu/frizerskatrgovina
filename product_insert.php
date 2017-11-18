<?php
include_once 'connection.php';

    $ime = $_POST['ime'];
    $opis = $_POST['opis'];
    $cena = $_POST['cena'];
    $kolicina_izdelkov = $_POST['kolicina_izdelkov'];
    $opis_slike = $_POST['opis_slike'];
    
   //$kategorije_id = implode(', ', $_POST['kategorije']);
 
    
    $query = sprintf("INSERT INTO izdelki (ime, opis, cena, kolicina) 
                          VALUES ('%s','%s','$cena', '$kolicina_izdelkov'); ",
                         mysqli_real_escape_string($link, $ime),
                         mysqli_real_escape_string($link, $opis));
    
    if (mysqli_query($link, $query)) {
    $last_id = mysqli_insert_id($link);
    //echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($link);
}
  
foreach($_POST['kategorije'] as $kategorije_id){
   $query1 = "INSERT INTO kategorije_izdelki (izdelek_id, kategorija_id) 
                          VALUES ('$last_id','$kategorije_id')";
if (mysqli_query($link, $query1)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query1 . "<br>" . mysqli_error($link);
}
header('Location: product_add.php');
    }
    
    
    //vstavljanje slike
 include_once 'connection.php';

$target_dir = "slike/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        
         $query4 = "INSERT INTO slike (izdelek_id, url, opis) 
                          VALUES ('$last_id','$target_file','$opis_slike')";
       
    if (mysqli_query($link, $query4)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query4 . "<br>" . mysqli_error($link);
    }
        header('Location: product_add.php');
    } 
    
    else {
        echo "Sorry, there was an error uploading your file.";
    }
}



    