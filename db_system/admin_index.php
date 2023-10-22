<?php
    session_start();
    if(!$_SESSION['login_admin']){
        session_destroy();
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>

    <?php 
        include_once 'db.php';
        $id = $_GET['id'];
        $sql = "SELECT * FROM db_system WHERE `id` = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $home = 'active';
        include 'admin_nav.php';
    ?>

    <div class="container card shadow-lg" >
        <div class="pro-card">
            <img src="upload/<?php echo $row['profile'] ?>" alt="">
        </div>
        <h1 class="text-center">Welcome '<?php echo $row['username']; ?>'</h1>
        <hr>
        
            <div class="box mb-3">
                <h3>Username : </h3>
                <p><?php echo $row['username'] ?></p>
                <br>
                <h3>Surname : </h3>
                <p><?php echo $row['surname'] ?></p>
                <br>
                <h3>Phone : </h3>
                <p><?php echo $row['phone'] ?></p>
                <br>
                <h3>Gender : </h3>
                <p><?php echo $row['gender'] ?></p>
            </div>

            <a href="user_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning mb-3">Edit Profile</a>
            <a href="change_password.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary">Change Password</a>
    </div>
</body>
</html>