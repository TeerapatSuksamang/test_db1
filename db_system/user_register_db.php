<?php 

    include_once 'db.php';

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $surname = $_POST['surname'];
        $pass = $_POST['password'];
        $pass2 = $_POST['password2'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];

        $temp = explode('.' ,$_FILES['profile']['name']);
        $filename = rand() . '.' . end($temp);
        $filepath = "upload/" . $filename;

        $check_username = "SELECT * FROM db_system 
        WHERE username = '$username' ";
        $result_username = mysqli_query($conn, $check_username);

        if(mysqli_num_rows($result_username) > 0 ){
            echo "<script>alert('Change The Username'); window.location = 'user_register.html';</script>";
        } else {
            // if(strlen($pass) < 8){
            //     echo "<script>alert('รหัสผ่านต้องมากกว่า 8 ตัว'); window.location = 'user_register.html';</script>";       
            // } else {
                // echo "<script>alert('Ok'); window.location = 'user_register.html';</script>";
                if($pass != $pass2){
                    echo "<script>alert('Check the password'); window.location = 'user_register.html';</script>";                    
                } else {

                    if(move_uploaded_file($_FILES['profile']['tmp_name'], $filepath)){
                        $sql = "INSERT INTO db_system(`username`,`surname`,`password`,`profile`,`phone`,`gender`)
                        VALUE ('$username','$surname','$pass','$filename','$phone','$gender')";
                        $result1 = mysqli_query($conn,$sql);
                    } else {
                        $sql = "INSERT INTO db_system(`username`,`surname`,`password`,`phone`,`gender`)
                        VALUE ('$username','$surname','$pass','$phone','$gender')";
                        $result1 = mysqli_query($conn,$sql);
                    }
    
                    // echo "<script>alert('Collect'); window.location = 'insert.php';</script>";
    
                    if($result1){
                        echo "<script>alert('Succesfull'); window.location = 'login.php';</script>";
                    } else {
                        echo "<script>alert('error');</script>";
                    }
                }
            // }
        }
    }
?>