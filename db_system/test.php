<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <h2>Registration Form</h2>
    <form action="process.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required><br><br>

        <label for="phoneNumber">Phone Number:</label>
        <input type="tel" id="phoneNumber" name="phoneNumber" required pattern="[0-9]{10}"><br><br>


        
        <label for="gender">Gender:</label>
        <input type="radio" id="male" name="gender" value="male" required>
        <label for="male">Male</label>
        
        <input type="radio" id="female" name="gender" value="female" required>
        <label for="female">Female</label>
        
        <input type="radio" id="other" name="gender" value="other" required>
        <label for="other">Other</label><br><br>

        <button type="submit">Submit</button>
        <!-- <a href="process.php"></a> -->
    </form>

    
</body>
</html>
