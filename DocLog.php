<?php
session_start();

// Include your database connection file
require('db.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $doctorname = $_POST['doctorname'];
    $password = $_POST['password']; // Note: In production, remember to hash the password before comparing

    // Query to check if the provided credentials match any record in the database
    $query = "SELECT * FROM doctors WHERE doctorname='$doctorname' AND password='$password'";
    $result = $con->query($query);

    if ($result->num_rows > 0) {
        // Login successful
        $_SESSION['doctorname'] = $doctorname;
        header("Location: DocDashboard.php");
    } else {
        // Login failed
        echo "<p>Invalid email or password.</p>";
    }

    // Close the database connection
    $con->close();
}
?>