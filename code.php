<?php
require('db.php');
session_start();

// Check if appointment_id is provided in the URL
if (isset($_GET['appointment_id'])) {
    $appointment_id = (int) $_GET['appointment_id'];

    // Fetch the appointment details from the database based on the provided appointment_id
    $fetch_query = "SELECT appointment_time FROM appointments WHERE id = ?";
    $stmt = $con->prepare($fetch_query);
    $stmt->bind_param('i', $appointment_id);
    $stmt->execute();
    $stmt->bind_result($appointment_time);
    $stmt->fetch();
    $stmt->close();

    // Format the appointment time
    $formatted_appointment_time = date('l, F j, Y \a\t g:i A', strtotime($appointment_time));
} else {
    $formatted_appointment_time = "Invalid request. Please provide an appointment ID.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Updated Appointment Time</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .card {
            max-width: 500px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Updated Appointment Time</h2>
            </div>
            <div class="card-body">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                    <div class="form-group">
                        <label for="appointment_id">Appointment ID:</label>
                        <input type="number" name="appointment_id" id="appointment_id" class="form-control" required>
                    </div>
                    <input type="submit" value="Submit" class="btn btn-primary">
                </form>
                <hr>
                <div class="text-center">
                    <h4><?php echo $formatted_appointment_time; ?></h4>
                </div>
            </div>
        </div>
    </div>
</body>
</html>