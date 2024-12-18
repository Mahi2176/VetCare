<?php
require('db.php'); // Include your database connection

// Start session to maintain user login state
session_start();

// Check if user is logged in, if not redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: UserLog.html");
    exit;
}

// Fetch user's appointment data based on their username
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE name = '$username'";
$result = $con->query($query);

$time_query = "SELECT MAX(appointment_time) AS latest_appointment FROM appointments";
$time_result = $con->query($time_query);
$time_row = $time_result->fetch_assoc();
$latest_appointment_time = $time_row['latest_appointment'];

// Count the number of available appointment slots
$max_appointments = 10; // Assuming maximum appointments allowed is 10
$available_appointments = $max_appointments - $time_result->num_rows;

// Close the database connection
$con->close();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>User Dashboard</title>
    <!-- CSS styles -->
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #e9ecef; /* Light gray background */
        margin: 0;
        padding: 0;
        
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    padding: 20px;
    background-image: url('images/aaa.jpg');
    background-size: cover ; /* Set the background size to cover the entire element */
    background-repeat: no-repeat;
    background-position: center;
    background-color: rgba(0, 0, 0, 0.5); /* This sets the background color to black with 50% opacity */
}
    
    .container {
        max-width: 800px;
        margin: 50px auto;
        background-color: #ffffff; /* White background */
        border-radius: 5px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        padding: 20px;
        transition: all 0.3s ease; /* Smooth transition */
    }
    .container:hover {
        box-shadow: 0px 0px 15px 5px rgba(0, 0, 0, 0.1); /* Hover effect with larger shadow */
    }
    h1 {
        color: #333333; /* Dark gray heading */
        text-align: center;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        border: 2px solid black;
    }
    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #dddddd; /* Light gray border */
    }
    th {
        background-color: #f8f9fa; /* Light gray background for table headers */
    }
    tr:nth-child(even) {
        background-color: #f3f3f3; /* Alternate row background */
    }
    tr:hover {
        background-color: #e2e6ea; /* Hover effect for rows */
    }
    .logout-link {
        display: block;
        width: 100px;
        margin: 20px auto;
        text-align: center;
        background-color: #28a745; /* Green logout button */
        color: #ffffff; /* White text */
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease; /* Smooth transition */
    }
    .logout-link:hover {
        background-color: #218838; /* Darker green on hover */
    }
    tr{
        background-color: lightblue; /* Alternate row background */
        
    }
    th{
        background-color: green; /* Alternate row background */
        
    }
</style>
</head>
<body>
    <h1>Welcome to Your Dashboard, <?php echo $username; ?></h1>

    <!-- Display user's appointment data -->
    <?php if ($result->num_rows > 0) : ?>
        <h2>Your Appointments</h2>
        <table>
            <tr>
                <th>Appointment Date</th>
                <th>Pet Type</th>
                <th>Service</th>
                <th>Doctor</th>
                <th>Status</th>
                <?php if ($available_appointments > 0) : ?> <!-- Check if there are available appointment slots -->
                    <th>Contact</th>
                <?php endif; ?>
            </tr>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <?php $time_row = $time_result->fetch_assoc(); ?>
                <tr>
                    <td><?php echo $row['appointment_date']; ?></td>
 <!-- Display the latest appointment time -->
                    <td><?php echo $row['pettype']; ?></td>
                    <td><?php echo $row['service']; ?></td>
                    <td><?php echo $row['doctorname']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <!-- Show the link to "contact.php" if the status is 'accepted' and there are available appointment slots -->
                    <?php if ($row['status'] == 'accepted' && $available_appointments > 0) : ?>
                        <td><a href="contact.php">Contact Us</a></td>
                    <?php endif; ?>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else : ?>
        <p>No appointments found.</p>
    <?php endif; ?>
    <br><br>
    <button style="background-color: #4CAF50; color: white; padding: 12px 24px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; border-radius: 4px; border: none; cursor: pointer; transition: background-color 0.3s ease;">
  <a href="code.php" style="color: inherit; text-decoration: none;">Check Updated Timing</a>
</button>
</body>
</html>
