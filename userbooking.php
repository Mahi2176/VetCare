<?php 
require('db.php'); // Include your database connection

$statusMsg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if(isset($_POST['name']) && isset($_POST['appointment_date']) && isset($_FILES['file'])) {
        // Handle user appointment request submission

        
        
      // Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$appointment_date = $_POST['appointment_date'];
$pettype = $_POST['pettype'];
$service = $_POST['service'];
$problemdescription = $_POST['problemdescription'];
$doctorname = $_POST['doctorname']; // Add this line to retrieve the selected doctor's name

// Handle image upload
$fileName = basename($_FILES["file"]["name"]);
$uploadDir = "uploads/";
$targetFilePath = $uploadDir . $fileName;

if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
    // Insert the appointment request into the database along with the doctorname
    $query = "INSERT INTO users (name, email, address, appointment_date, pettype, service, problemdescription, file_name, status, doctorname) VALUES ('$name', '$email', '$address', '$appointment_date', '$pettype', '$service', '$problemdescription', '$fileName', 'pending', '$doctorname')";
    $result = $con->query($query);

    if ($result) {
        echo "<p style='color: green;'>Appointment request sent successfully!</p>";
    } else {
        echo "Error: " . $con->error;
    }
} else {
    echo "Sorry, there was an error uploading your file.";
}
        }

        // Close the database connection
        $con->close();
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <style>
        body {
            background: #3e4144;
            font-family: Arial, sans-serif;
            background-image:url('images/app.jpg');
            background-size: 100% 100%;
        background-position: center;
        background-attachment: fixed;
        color: #fff;
        }

        .form {
            margin: 50px 170px;
            width: 400px;
            padding: 30px 25px;
            background: white;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        h1.login-title {
          
            color: #333;
            margin: 0 auto 25px;
            font-size: 25px;
            font-weight: 300;
            /* text-align: center; */
        }

        .login-input, select {
            font-size: 15px;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 15px;
            width: calc(100% - 23px);
            border-radius: 3px;
            box-sizing: border-box;
        }

        .login-input:focus {
            border-color: #6e8095;
            outline: none;
        }

        .login-button {
            color: #fff;
            background: #55a1ff;
            border: 0;
            outline: 0;
            width: 100%;
            height: 50px;
            font-size: 16px;
            text-align: center;
            cursor: pointer;
            border-radius: 3px;
            /* transition: background 0.3s; */
        }

        .login-button:hover {
            background: #4e90ff;
        }

        .link {
            color: #666;
            font-size: 15px;
            text-align: center;
            margin-bottom: 10px;
        }

        .link a {
            color: #666;
        }

        h3 {
            font-weight: normal;
            text-align: center;
        }
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');

.login-title {
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-size: 3rem;
    /* text-align: center; */
    color: #333;
    margin-bottom: 30px;
    /* position: relative; */
    text-transform: uppercase;
    letter-spacing: 2px;
}

.login-title::before,
.login-title::after {
    content: "";
    position: absolute;
    bottom: -10px;
    width: 50px;
    height: 3px;
    background-color: #ff6b6b;
    border-radius: 2px;
}

.login-title::before {
    left: 50%;
    transform: translateX(-100%);
}

.login-title::after {
    right: 50%;
    transform: translateX(100%);
}
        
    </style>
</head>
<body>
<h1 class="login-title" >Appointment Request</h1>

<form class="form" action="" method="post" enctype="multipart/form-data">
    <input type="text" name="name" class="login-input" id="name" placeholder="Name" required><br>
    <input type="text" name="email" class="login-input" id="email" placeholder="Email" required><br>
    <input type="text" name="address" class="login-input" id="address" placeholder="Address" required><br>
    <input type="date" name="appointment_date" class="login-input" id="appointment_date" required><br>
    <input type="text" name="pettype" class="login-input" id="pettype" placeholder="Pet Type" required><br>
    <select name="service" id="service" required>
        <option value="">Select Service</option>
        <option value="vaccination">Vaccination</option>
        <option value="checkup">Checkup</option>
        <option value="grooming">Grooming</option>
        <option value="gentlecare">Gentle Care</option>
        <option value="psychotherapy">Psychotherapy</option>
    </select><br>
    <input type="text" name="problemdescription" class="login-input" id="problemdescription"
           placeholder="Problem Description" required><br>
   <input type="file" name="file">
   <br><br>
   <select name="doctorname" id="doctorname" required>
    
    <option value="">Select Doctor</option>
    <?php
    // Connect to the database
    include('db.php');
    // If the form has been submitted
    if(isset($_POST['doctorname'])) {
        $doctorname = $_POST['doctorname'];
        // The rest of your code for handling the appointment request
    }

    // Query to fetch doctor names
    $doctor_query = "SELECT doctorname FROM doctors";
    $doctor_result = $con->query($doctor_query);

    // Populate the dropdown with the list of doctors
    if ($doctor_result->num_rows > 0) {
        while ($row = $doctor_result->fetch_assoc()) {
            echo "<option value='" . $row['doctorname'] . "'>" . $row['doctorname'] . "</option>";
        }
    } else {
        echo "<option value=''>No doctors found</option>";
    }

    // Close the database connection
    $con->close();
    ?>
</select><br>
   <input type="submit" name="submit" value="Send Request" class="login-button">
</form>
</body>
</html>
