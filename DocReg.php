<?php
// Include your database connection file
require('db.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $doctorname = $_POST['doctorname'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Note: In production, it's better to hash the password for security
    $specialization = $_POST['specialization'];

    // Insert doctor data into the database
    $query = "INSERT INTO doctors (doctorname, email, password, specialization) VALUES ('$doctorname', '$email', '$password', '$specialization')";
    $result = $con->query($query);

    if ($result) {
        // Registration successful
        echo "<p>Doctor registration successful!</p>";
        header("DocLog.php");
    } else {
        // Registration failed
        echo "<p>Error: " . $con->error . "</p>";
    }

    // Close the database connection
    $con->close();
}
?>