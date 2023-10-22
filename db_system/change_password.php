<?php 
    session_start();
    // if(!$_SESSION['login']){
    //     session_destroy();
    //     header('location: login.php');
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/cng_pass.css">
</head>
<body class="pt-5">
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
            </div>
        </div>
    </nav>

    <form action="change_password_db.php" class="" method="post">
        <h2 class="text-center">Change Password</h2>
        <hr><br>
        <input type="hidden" value="<?php echo $row['password']; ?>" name="df_pass">
        <input type="hidden" value="<?php echo $row['id']; ?>" name="id">

        <input type="password" placeholder="Current password" name="old_pass">
        
        <input type="password" placeholder="New password" name="new_pass">
        <input type="password" placeholder="Confirm password" name="confirm_pass">

        <button class="btn btn-success w-100 mb-3" name="submit">Change Password</button>
        <a href="user_index.php?id=<?php echo $id;?>" class="btn btn-warning w-100 mb-4">Go Back</a>
        <a href="">Forgot the password?</a>
    </form>
</body>
</html>