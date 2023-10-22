<?php 
    session_start();
    if(!$_SESSION['login_user']){
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
    <title>User Index</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>    
    <link rel="stylesheet" href="css/index.css">
</head>
<body>

    <!-- 
        // if(isset($_POST['submit'])){
            // session_start();
            // session_destroy();
        // }
     -->

    <?php 
        include_once 'db.php';
        $id = $_GET['id'];
        $sql = "SELECT * FROM db_system WHERE `id` = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
    ?>

    <nav class="navbar navbar-expand-sm fixed-top navbar-dark bg-dark">
        <div class="container navbar-content">
            <div class="pro-brand">
                <img src="upload/<?php echo $row['profile'] ?>" alt="">
            </div>
            <a href="" class="navbar-brand" onclick="window.location.reload()">User Index</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ms-auto me-2">
                    <li class="nav-item">
                        <a href="" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Edit</a>
                    </li>
                </ul>
                <hr class="text-light">
                <a href="logout.php" class="btn btn-danger">Log-out</a>
                <!-- <form action="" method="post">
                    <input type="submit" name="submit" class="btn btn-danger" value="Log-out">
                </form> -->
            </div>
        </div>
    </nav>


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