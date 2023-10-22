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
    <title>User Edit Profile</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>    
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body class="pt-5">

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

        $gender = $row['gender'];
        echo $gender;
        $male = 0;
        $female = 0;
        $other = 0;
        if($gender == 'male'){
            $male = 'checked';
        } else if($gender == 'female'){
            $female = 'checked';
        } else {
            $other = 'checked';
        }
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


    <form class="rounded shadow-lg " action="user_edit_db.php" method="post" enctype="multipart/form-data" >
        <div class="pro-card">
            <img src="upload/<?php echo $row['profile'] ?>" alt="">
        </div>
        <h2 class="text-center">Edit Profile</h2>
        <hr>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="df_name" value="<?php echo $row['username']; ?>">
        
        <input type="text" placeholder="Username" name="username" value="<?php echo $row['username']; ?>" required>

        <input type="text" placeholder="Surname" name="surname" value="<?php echo $row['surname']; ?>" required>

        <input type="tel" placeholder="Phone" name="phone" value="<?php echo $row['phone']; ?>" required>

        <label for="gender"><h5>Gender</h5></label><br>
        <input type="radio" id="male" name="gender" value="male" <?php echo $male; ?> required>
        <label for="male" class="me-3">Male</label>
        
        <input type="radio" id="female" name="gender" value="female" <?php echo $female; ?> required>
        <label for="female" class="me-3">Female</label>
        
        <input type="radio" id="other" name="gender" value="other" <?php echo $other; ?> required>
        <label for="other" class="me-3">Other</label>
        <br>

        <label for="profile" class="label"><h5>Profile</h5></label>  
        <input type="file" class="form-control" name="profile">
                    

        <div class="but">
            <button class="btn btn-success" name="submit">Edit Profile</button>
            <a class="btn btn-warning " href="user_index.php?id=<?php echo $row['id']; ?>">Back</a>
        </div>
        </form>


</body>
</html>