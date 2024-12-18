<?php
// Establish a database connection (assuming you have a file db.php with connection details)
require('db.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $message = $_POST['message'];

    // Insert data into the database
    $query = "INSERT INTO callbacks (full_name, email, phone_number, message) VALUES ('$full_name', '$email', '$phone_number', '$message')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Callback Submitted'); window.location.href='index.html';</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
