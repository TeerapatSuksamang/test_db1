<nav class="navbar navbar-expand-sm fixed-top navbar-dark bg-dark">
        <div class="container navbar-content">
            <div class="pro-brand">
                <img src="upload/<?php echo $row['profile'] ?>" alt="">
            </div>
            <a href="" class="navbar-brand" onclick="window.location.reload()">Admin Index</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ms-auto me-2">
                    <li class="nav-item">
                        <a href="admin_index.php?id=<?php echo $id; ?>" class="nav-link <?php echo $home?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="manage_user.php?id=<?php echo $id; ?>" class="nav-link <?php echo $mnu?>" >Manage user</a>
                    </li>
                </ul>
                <hr class="text-light">
                <a href="logout.php" class="btn btn-danger">Log-out</a>
            </div>
        </div>
    </nav>