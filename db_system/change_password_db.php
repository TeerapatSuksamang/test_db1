<?php

    include_once 'db.php';
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $df_pass = $_POST['df_pass'];
        $old_pass = $_POST['old_pass'];
        $new_pass = $_POST['new_pass'];
        $confirm_pass = $_POST['confirm_pass'];

        if($df_pass == $old_pass){
            if($new_pass == $confirm_pass){
                // echo "y";
                $update_pass = "UPDATE `db_system` SET `password` = '$new_pass' WHERE `id` = '$id'";
                $result = mysqli_query($conn, $update_pass);
                if($result){
                    echo "<script>alert('Change password is succesfull'); window.location='user_index.php?id=$id';</script>";
                } else {
                    echo "error";
                }
            } else {
                echo "<script>alert('New password doesnt match'); window.location='change_password.php?id=$id';</script>";
                echo "<script>alert('not'); window.location='change_password.php?id=$id';</script>";
            }
        } else {
            echo "<script>alert('Current password is incorrect'); window.location='change_password.php?id=$id';</script>";
        }
    }
?>