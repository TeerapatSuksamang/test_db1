<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "db_system";

    $conn = mysqli_connect($servername, $username, $password, $db_name);

    if(!$conn){
        die("fail" . mysqli_connect_error());
    }
?>