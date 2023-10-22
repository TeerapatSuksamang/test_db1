<?php
    session_start();
    if(!$_SESSION['login_admin'] or $_GET['id'] != 1){
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
    <title>Manage User</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="css/index.css">
    <style>
        table{
            margin-top: 1rem;
            margin-bottom: 5rem;
            width: 100%;    
        }

        tr, td{
            border: 1px solid black;
            padding: .3rem .5rem;
        }

        th{
            text-align: center;
            background-color: rgb(44, 44, 44);
            color: #fff;
            padding: .8rem;
        }
        .profile{
            border: 1px solid black;
            width: 6rem;
            height: 6rem;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto;
        }
        .profile img{
            width: 100%;
            height: auto;
            object-fit: cover;
            object-position: center center;
        }
    </style>
</head>
<body>
    <?php 
        include_once 'db.php';
        $id = $_GET['id'];
        $sql = "SELECT * FROM db_system WHERE `id` = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $mnu = 'active';
        include 'admin_nav.php';
    ?>

<div class="container content mt-5 pt-5 table">
        <h1>Manage Memeber</h1>
        <form action="" method="post" class="mb-2">
            <input type="text" name="src_user" placeholder="Search" class="p-1">
            <input type="submit" value="search" name="search" class="p-1"> 

            <div class="float-end pb-3">
                <button onclick="selectAll()" class="btn btn-success">Select all</button>
                <button onclick="unSelect()" class="btn btn-secondary">Unselect</button>
            </div>
        </form>
        <table class="table-hover table-bordered tablestriped text-center shadow-sm w-100">
            <tr class="bg-dark text-light h5">
                <th>ID</th>
                <th>Username</th>
                <th>Surname</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Profile</th>
                <th>Delete</th>
                <th>Select</th>
            </tr>
            <?php 
                (isset($_POST['search']) ? $username =  $_POST['src_user'] : $username = '');
                $sql1 = "SELECT * FROM db_system WHERE username LIKE '%$username%' ORDER BY id";
                $result1 = mysqli_query($conn, $sql1);
            ?>
            <?php while($rows = mysqli_fetch_array($result1)){ ?>
            <tr>
                <td><?php echo $rows['id'];?></td>
                <td><?php echo $rows['username'];?></td>
                <td><?php echo $rows['surname'];?></td>
                <td><?php echo $rows['gender'];?></td>
                <td><?php echo $rows['phone'];?></td>
                <td>
                    <div class="profile">
                        <img src="upload/<?php echo $rows['profile'] ?>" alt="">
                    </div>
                </td>
                <td class="button">
                    <!-- <a href="admin_edit.php?ID=" 
                    class="btn btn-warning ">แก้ไข</a> -->
                    <a href="admin_del.php?id=<?php echo $rows['id'];?>" 
                    class="btn btn-danger w-100">ลบ</a>
                </td>
                <td>
                    <form action="">
                        <input type="checkbox" class="form-check-input">
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>


</body>
</html>