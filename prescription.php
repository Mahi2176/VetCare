<?php
require('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user inputs (optional but recommended)
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $diagnosis = mysqli_real_escape_string($con, $_POST['diagnosis']);
    $medication = mysqli_real_escape_string($con, $_POST['medication']);
    $dosage = mysqli_real_escape_string($con, $_POST['dosage']);

    // Prepare and bind the SQL statement
    $query = "INSERT INTO prescription (name, diagnosis, medication, dosage) VALUES (?, ?, ?, ?)";
    $statement = $con->prepare($query);
    $statement->bind_param("ssss", $name, $diagnosis, $medication, $dosage);

    // Execute the statement
    if ($statement->execute()) {
        echo "<script>alert('Prescription Stored Successfully');</script>";
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
    }

    // Close the statement
    $statement->close();
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Prescription Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      padding: 20px;
      background-color: #f8f9fa;

    background-image: url('images/ddd.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-color: rgba(0, 0, 0, 0.5); /* This sets the background color to black with 50% opacity */
}

    
    .form {
      max-width: 500px;
      margin:140px -80px;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
    }
    .form h1 {
      text-align: center;
      margin-bottom: 20px;
    }
    .login-input {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ced4da;
      border-radius: 5px;
      box-sizing: border-box;
    }
    .login-button {
      width: 100%;
      padding: 10px;
      border: none;
      background-color: #007bff;
      color: #fff;
      border-radius: 5px;
      cursor: pointer;
    }
    .login-button:hover {
      background-color: #0056b3;
    }
    #prescriptionResult {
      margin-top: 20px;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

<div class="container">
  <form class="form" action="" method="post">
    <h1 class="login-title">Doctor Prescription Form</h1>
    <input type="text" class="login-input" name="name" placeholder="Patient Name" required />
    <input type="text" class="login-input" name="diagnosis" placeholder="Diagnosis">
    <input type="text" class="login-input" name="medication" placeholder="Medication">
    <input type="text" class="login-input" name="dosage" placeholder="Dosage">
    <button type="submit" name="submit" value="Register" class="login-button">Submit Prescription</button>
  </form>
</div>
</body>
</html>
