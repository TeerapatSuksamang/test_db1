<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/form.css">
</head>
<body class="container">

    <form action="login_db.php" class=" shadow" method="post" enctype="multipart/form-data">
        <h1>Login</h1>
        <br>

        <input type="text" placeholder="Username" name="username" required>

        <input type="password" placeholder="Password" name="password" class="w-100" required>

        <input type="submit" class="btn btn-success mt-2" name="submit" value="Submit">
        <a href="user_register.html">Regsiter</a>
    </form>
</body>
</html>