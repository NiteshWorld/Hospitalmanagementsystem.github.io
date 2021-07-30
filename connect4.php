<?php

$host = "localhost:3306";
$dbusername = "root";
$dbpassword = "";
$dbname = "hospital";
  
//create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

$id = $_GET['id'];
$deletequery = " DELETE FROM appointment1 WHERE id=$id ";
$query = mysqli_query($conn,$deletequery);

if($query){
    ?>
        <script>
            alert("Deleted Successfully!");
        </script>
    <?php
    
}else{
    ?>

    <script>
        alert("Not Deleted!");
    </script>

    <?php

}

header('location:adminpanel.php');




?>