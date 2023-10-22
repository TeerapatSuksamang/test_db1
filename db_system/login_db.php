<?php
    session_start();
    include_once 'db.php';
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $check_UP = "SELECT * FROM db_system WHERE username = '$username' and password = '$password' ";
        $result_UP = mysqli_query($conn, $check_UP);

        $row = mysqli_fetch_assoc($result_UP);
        ($row >= 1 ? $id = $row['id'] : $id = '' );

        if(!empty($row)){
            if($row['permis'] == 'admin'){
                $_SESSION['login_admin'] = $row['id'];
                echo "<script>window.location = 'admin_index.php?id=$id';</script>";
                // echo "<script>alert('admin'); window.location = 'admin_index.php?id=$id';</script>";
            } else {
                $_SESSION['login_user'] = $row['id'];
                echo "<script>window.location = 'user_index.php?id=$id';</script>";
                echo "<script>alert('user'); window.location = 'user_index.php?id=$id';</script>";
            }
        } else {
            echo ("<script>alert('Wrong username or password'); window.location = 'login.php';</script>");
        }
        
    }
?>