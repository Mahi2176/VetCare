<!-- doctor_dashboard.php -->

<?php
require('db.php');
// include('header.php');
session_start();

// Check if the doctor is logged in, if not redirect to login page
if (!isset($_SESSION['doctorname'])) {
    header("Location: doctorlogin.php");
    exit;
}

$doctorname = $_SESSION['doctorname'];

// Fetch user details
$query = "SELECT * FROM users WHERE doctorname='$doctorname'";
$result = $con->query($query);
// Handle accept or reject actions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['action']) && isset($_POST['user_id'])) {
        $user_id = $_POST['user_id'];
        $action = $_POST['action'];

        // Update user status in the database
        $update_query = "UPDATE users SET status = '$action' WHERE id = '$user_id'";
        $update_result = $con->query($update_query);

        if ($update_result) {
            echo "<script>alert('Status Changed to $action');</script>";
        } else {
            echo "Error: " . $con->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    padding: 20px;
    background-image: url('images/aaa.jpg');
    background-size: 100% 100%; /* Set the background size to cover the entire element */
    background-repeat: no-repeat;
    background-position: center;
    background-color: rgba(0, 0, 0, 0.5); /* This sets the background color to black with 50% opacity */
}
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #04AA6D;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #04AA6D;
        }
        img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>
<body>
    <h1>Doctor Dashboard</h1>
        <table>
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Appointment Date</th>
            <th>Pettype</th>
            <th>Service</th>
            <th>Problem Description</th>
            <th>Status</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['appointment_date']; ?></td>
                <td><?php echo $row['pettype']; ?></td>
                <td><?php echo $row['service']; ?></td>
                <td><?php echo $row['problemdescription']; ?></td>
                <td><?php echo $row['status']; ?></td>
           <td><img src="uploads/<?php echo $row['file_name']; ?>" alt="User Image"></td>

                <td>
                    <form action="" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="action" value="accepted">Accept</button>
                        <button type="submit" name="action" value="rejected">Reject</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>





