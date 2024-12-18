<?php
session_start();

// Check if the doctor is logged in, if not redirect to login page
if (!isset($_SESSION['doctorname'])) {
    header("Location: doctorlogin.php");
    exit;
}

// Include your database connection file
require('db.php');

// Get the doctor's name from session
$doctorname = $_SESSION['doctorname'];

// Fetch users who selected the specific doctor
$query = "SELECT * FROM users WHERE doctorname='$doctorname'";
$result = $con->query($query);

// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <!-- Add your CSS styles here -->
</head>
<body>
    <h2>Welcome, <?php echo $doctorname; ?>!</h2>
    <h3>Patients Assigned to You:</h3>

    <?php if ($result->num_rows > 0) : ?>
        <ul>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <li><?php echo $row['name']; ?> - <?php echo $row['appointment_date']; ?></li>
            <?php endwhile; ?>
        </ul>
    <?php else : ?>
        <p>No patients assigned to you.</p>
    <?php endif; ?>

    <a href="logout.php">Logout</a>
</body>
</html>
