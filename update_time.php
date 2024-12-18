
<!-- update_time.php -->
<?php
require('db.php');

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['appointment_id']) && isset($_POST['update_time'])) {
        $appointment_id = sanitize_input($_POST['appointment_id']);
        $update_time = sanitize_input($_POST['update_time']);

        // Prepare update query
        $update_query = "UPDATE appointments SET appointment_time='$update_time' WHERE id=$appointment_id";

        // Execute update query
        if ($con->query($update_query) === TRUE) {
            $response = ['success' => true];
        } else {
            $response = ['success' => false, 'message' => 'Error updating appointment time: ' . $con->error];
        }
    } else {
        $response = ['success' => false, 'message' => 'Missing required parameters'];
    }
} else {
    $response = ['success' => false, 'message' => 'Invalid request method'];
}

echo json_encode($response);
$con->close();
?>