<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $username = $_POST['username'];
    $firstName = $_POST['firstName'];
    $phoneNumber = $_POST['phoneNumber'];
    $gender = $_POST['gender'];

    // You can perform validation and further processing here
    
    // For demonstration purposes, let's just display the submitted data
    echo "Username: " . $username . "<br>";
    echo "First Name: " . $firstName . "<br>";
    echo "Phone Number: " . $phoneNumber . "<br>";
    echo "Gender: " . $gender . "<br>";
} else {
    // Handle the case where the form was not submitted
    echo "Form was not submitted.";
}
?>
