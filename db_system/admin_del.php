<?php
    include_once 'db.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM db_system WHERE id = '$id'";
        echo (mysqli_query($conn, $sql) ? "<script>window.location = 'manage_user.php?id=1';</script>" : 'error' );
    }
?>