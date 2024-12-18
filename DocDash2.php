<?php
    require('db.php'); 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    

// Function to sanitize input data
function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to send email notification
function sendEmailNotification($to, $name, $appointment_time, $id) {
    // Email details
    $subject = "Appointment Booked";
    $message = "Dear $name,\n\nYour appointment (ID: $id) has been changed to $appointment_time.";

    // Create a new PHPMailer instance
 
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'vetcare2024@gmail.com'; // Change to your Gmail email address
        $mail->Password   = 'wcbn xtdb ydku kmzg'; // Change to your Gmail password
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        // Sender and recipient settings
        $mail->setFrom('vetcare2024@gmail.com', 'Vetcare'); // Change to your Gmail email address and your name
        $mail->addAddress($to); // Add user's email address from shipping details
        $mail->addReplyTo('vetcare2024@gmail.com');

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        // Send email
        $mail->send();

        echo "
        <script> 
            alert('Email notification sent.');
            window.location.href = 'DocDashboard.php';
        </script>
        ";
    } catch (Exception $e) {
        echo "
        <script> 
            alert('Failed to send email notification. Please try again later.');
            window.location.href = 'DocDashboard.php';
        </script>
        ";
    }
}

// Handle form submission for updating appointment time
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['appointment_id'], $_POST['update_time'])) {
    $appointment_id = (int) sanitize_input($_POST['appointment_id']);
    $update_time = sanitize_input($_POST['update_time']);

    $update_query = "UPDATE appointments SET appointment_time = ? WHERE id = ?";
    $stmt = $con->prepare($update_query);
    $stmt->bind_param('si', $update_time, $appointment_id);
    $stmt->execute();

    if ($stmt->affected_rows) {
        echo "<script>alert('Appointment time updated successfully');</script>";
        
        // Retrieve appointment details
        $query = "SELECT * FROM appointments WHERE id = '$appointment_id'";
        $result = $con->query($query);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $email = $row['email'];
            $name = $row['name'];
            $appointment_time = $row['appointment_time'];
            sendEmailNotification($email, $name, $appointment_time, $appointment_id);
        }
    } else {
        echo "Error updating appointment time: " . $con->error;
    }
    $stmt->close();
}

// Fetch appointment details from the database
if (isset($_GET['doctorname'])) {
    $doctorname = sanitize_input($_GET['doctorname']);
    $query = "SELECT * FROM appointments WHERE doctorname = '$doctorname'";
} else {
    $query = "SELECT * FROM appointments";
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'/>
    <title>Appointment Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
    <!-- Custom CSS -->
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
            background-image: url('images/aaa.jpg');
            background-size: cover; /* Set the background size to cover the entire element */
            background-repeat: no-repeat;
            background-position: center;
            background-color: rgba(0, 0, 0, 0.5); /* This sets the background color to black with 50% opacity */
        }

        h2 {
            margin-bottom: 20px;
            color: #333333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        .form-control {
            display: block;
            width: 30%;
            height: calc(1.5em + .75rem + 2px);
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
    </style>
</head>
<body>
<div class='container'>
    <h2>Appointment Dashboard</h2>
    <form action='' method='GET'>
        <div class='form-group'>
            <label for='doctorname'>Filter by Doctor's Name:</label>
            <input type='text' class='form-control' id='doctorname' name='doctorname'
                   value='<?php echo htmlspecialchars($_GET['doctorname'] ?? ''); ?>'>
        </div>
        <button type='submit' class='btn btn-primary'>Filter</button>
        <button type='submit' class='btn btn-primary'>Back</button>

        <br><br>
    </form>

    <table>
        <tr>
            <th>Name</th>
            <th>Number</th>
            <th>Appointment Time</th>
            <th>Doctor's Name</th>
            <th>Action</th>
        </tr>
        <?php
        // Execute the query
        $result = $con->query($query);

        // Check if there are any appointments
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>" . htmlspecialchars($row["name"]) . "</td>
                <td>" . htmlspecialchars($row["number"]) . "</td>
                <td id='appointment_time_" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row["appointment_time"]) . "</td>
                <td>" . htmlspecialchars($row["doctorname"]) . "</td>
                <td>
                    <form method='post'>
                        <input type='hidden' name='appointment_id' value='" . htmlspecialchars($row['id']) . "'>
                        <input type='datetime-local' name='update_time' required>
                        <button type='submit' class='btn btn-primary'>Update</button>
                    </form>
                </td>
            </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No appointments found</td></tr>";
        }

        // Close the database connection
        $con->close();
        ?>

    </table>
</div>

<!-- Rest of your HTML code -->

</body>
</html>