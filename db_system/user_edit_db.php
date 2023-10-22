<?php
    include_once 'db.php';

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $df_name = $_POST['df_name'];
        $username = $_POST['username'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        
        $temp = explode('.', $_FILES['profile']['name']);
        $filename = rand() . '.' . end($temp);
        $filepath = "upload/" . $filename;

        $check_username = "SELECT * FROM db_system WHERE username = '$username'";
        $result = mysqli_query($conn, $check_username); 

        $fet = mysqli_fetch_array($result);

        /*if($fet){
            // echo ("ชื่อที่คุณเปลี่ยน " . $username . " | ชื่อในฐานข้อมูล : " . $fet['username'] . " | ชื่อเก่า : " . $df_name);
            if($fet['username'] == $df_name){
                // echo (" | เหมือนเดิม เปลี่ยนได้ | ");
                $c = true;
            } else {
                // echo (" ซ้ำคนอื่น ห้ามเปลี่ยน!!! ");
                echo "<script>alert('Please change this username');window.location = 'user_edit.php?id=$id';</script>";
                $c = false;
            }
        } else {
            echo " ชื่อยังไม่ซ้ำเปลี่ยนได้ ";
            $c = true;
        }*/
        if(!$fet || $fet['username'] == $df_name){
            // $c = true;
            // เปลี่ยนชื่อได้
            if(move_uploaded_file($_FILES['profile']['tmp_name'], $filepath)){
                $update = "UPDATE `db_system` SET
                `username` = '$username',
                `surname` = '$surname',
                `phone` = '$phone',
                `gender` = '$gender',
                `profile` = '$filename' WHERE `id` = '$id'";
                $result = mysqli_query($conn, $update);
            } else {
                $update = "UPDATE `db_system` SET
                `username` = '$username',
                `surname` = '$surname',
                `gender` = '$gender',
                `phone` = '$phone' WHERE `id` = '$id'";
                $result = mysqli_query($conn, $update);
            }
            
            if($result){
                echo "<script>alert('Edit Succesfull'); window.location = 'user_index.php?id=$id';</script>";
            } else {
                echo "<script>alert('Cannot Edit');</script>";
            }
        } else {
            echo "<script>alert('Please change this username');window.location = 'user_edit.php?id=$id';</script>";
            $c = false;
            // เปลี่ยนชื่อไม่ได้
        }


        /*if($c){
            // var_dump($c);
            if(move_uploaded_file($_FILES['profile']['tmp_name'], $filepath)){
                $update = "UPDATE `db_system` SET
                `username` = '$username',
                `surname` = '$surname',
                `phone` = '$phone',
                `gender` = '$gender',
                `profile` = '$filename' WHERE `id` = '$id'";
                $result = mysqli_query($conn, $update);
            } else {
                $update = "UPDATE `db_system` SET
                `username` = '$username',
                `surname` = '$surname',
                `gender` = '$gender',
                `phone` = '$phone' WHERE `id` = '$id'";
                $result = mysqli_query($conn, $update);
            }
            
            if($result){
                echo "<script>alert('Edit Succesfull'); window.location = 'user_index.php?id=$id';</script>";
            } else {
                echo "<script>alert('Cannot Edit');</script>";
            }
        } else {
            var_dump($c);
        }*/


        


        // echo ($check_username . "\n");
        // echo ("มีชื่อนี้ในฐานข้อมูลอยู่ : " . mysqli_num_rows($result) . "\n");

        // echo ($temp);
        // echo ($filename . "\n");
        // echo ($filepath . "\n");

        // echo (" ชื่อนี้ในฐาน " . $r);
        // echo (" ชื่อเดิม " . $df_name);

        // if($r == $df_name){
        //     echo " เหมือนเดิม";
        // } elseif (mysqli_num_rows($result) > 0){
        //     echo " ซ้ำคนอื่น ห้ามเปลี่ยน ";
        // } else {
        //     echo " ยังไม่ซ้ำใคร เปลี่ยนได้";
        // }


        // if(mysqli_num_rows($result)  > 0){
        //     echo ("ซ้ำ");
        // } else {
        //     echo ("no");
        // }


        
    }
?>