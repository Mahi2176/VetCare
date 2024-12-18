<?php
require('db.php'); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $appointment_time = $_POST['appointment_time'];
    $doctorname = $_POST['doctorname'];
    $email = $_POST['email']; // Add email field

    // Insert data into the database
    $query = "INSERT INTO appointments (name, number, appointment_time, doctorname, email) VALUES ('$name', '$number', '$appointment_time', '$doctorname', '$email')";
    if ($con->query($query) === TRUE) {
        // Retrieve the ID of the last inserted appointment
        $last_id = $con->insert_id;

        // Send email notification with the appointment ID
        sendEmailNotification($email, $name, $appointment_time, $last_id);
        echo "<script>alert('Appointment Booked');</script>";
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
    }
    $con->close();
}

// Function to send email notification
function sendEmailNotification($to, $name, $appointment_time, $id) {
    // Email details
    $subject = "Appointment Booked";
    $message = "Dear $name,\n\nYour appointment (ID: $id) has been successfully booked for $appointment_time.";

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
            window.location.href = 'userhome.php';
        </script>
        ";
    } catch (Exception $e) {
        echo "
        <script> 
            alert('Failed to send email notification. Please try again later.');
            window.location.href = 'userhome.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Appointment Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
            background-color: #e9ecef; /* Light gray background */
            margin: 0;
            padding: 0;
            background-image: url('images/aaa.jpg');
    background-size: cover; /* Set the background size to cover the entire element */
    background-repeat: no-repeat;
    background-position: center;
    background-color: rgba(0, 0, 0, 0.5);
        }

        h2 {
            margin-bottom: 20px;
            color: #333333;
            text-align: center;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="datetime-local"],
        input[type="email"] { /* Add styling for email input */
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        @import url('https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap');

h2 {
    font-family: 'Permanent Marker', cursive;
    font-size: 3rem;
    text-align: center;
    color: #2c3e50;
    margin-bottom: 30px;
    position: relative;
    text-transform: uppercase;
    letter-spacing: 2px;
    background-color: lightblue;
}

h2::before,
h2::after {
    content: "";
    position: absolute;
    top: 50%;
    width: 50px;
    height: 2px;
    background-color: #e67e22;
}

h2::before {
    left: 0;
    transform: translateX(-100%);
}

h2::after {
    right: 0;
    transform: translateX(100%);
}
    </style>
</head>
<body>
    <div class="container">
        <h2>Appointment Form</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="doctorname">Doctor's Name:</label>
                <input type="text" class="form-control" id="doctorname" name="doctorname" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="number">Number:</label>
                <input type="text" class="form-control" id="number" name="number" required>
            </div>   
            <div class="form-group">
                <label for="email">Email:</label> <!-- Add email input field -->
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="appointment_time">Appointment Time:</label>
                <input type="datetime-local" class="form-control" id="appointment_time" name="appointment_time" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
