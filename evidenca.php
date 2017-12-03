<?php
include_once 'connection.php';
include_once 'session.php';

echo '<div class="to-animate" style=";margin: -60px 25% 0 25%; text-align: center"><form method="post" action="index.php"><input placeholder="Išči uporabnika ..." type="text" name="search2" style="height: 35px; width: 200px; padding: 5px; border: 3px solid grey; border-radius: 25px" required/></form></div>';
echo '<div class="to-animate" style="margin: 0 25% 0 25%; text-align: center;">';
if(isset($_POST['search2'])){
    $imee = $_POST['search2'];
    $result = mysqli_query($link, "select id, ime from uporabniki where ime like '%$imee%' order by ime");
    $row = mysqli_num_rows($result);
    if($row!=0){
        while($rows = mysqli_fetch_assoc($result)){
            $id=$rows['id'];
            echo "<a style='color: black' class='to-animate' href='index.php?ide=$id#fh5co-explore'>".$imee = $rows['ime']."</a><br>";    
            echo '<a class="btn btn-select-plan btn-sm" style="color: white; background-color: #1fb5f6" href="../u_racun_delete.php?idizbris='.$id.'">IZBRIS</a>';
        } 
    }else{ 
            echo '<h1 class="to-animate" style="text-align: center;">Ni najdenih uporabnikov</h1>';
    }
echo '</div>';
}else{
$result = mysqli_query($link, "select id, ime from uporabniki order by ime");
$row = mysqli_num_rows($result);
    if($row!=0){
        while($rows = mysqli_fetch_assoc($result)){
            $id=$rows['id'];
            echo "<a style='color: black' class='to-animate' href='index.php?ide=$id#fh5co-explore'>".$imee = $rows['ime']."</a><br>"; 
            echo '<a class="btn btn-select-plan btn-sm" style="color: white; background-color: #1fb5f6" href="../u_racun_delete.php?idizbris='.$id.'">IZBRIS</a><br>';
        } 
    }
echo '</div>';
}
