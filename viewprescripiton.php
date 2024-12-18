<?php
require('db.php'); // Include your database connection

// Start session to maintain user login state
session_start();

// Check if user is logged in, if not redirect to login page
if (!isset($_SESSION['username'])) {
  header("Location:UserLog.html");
  exit;
}

// Fetch user's appointment data based on their username
$username = $_SESSION['username'];
$query = "SELECT * FROM prescription WHERE name = '$username'";
$result = $con->query($query);

// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pet Prescription Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #e9ecef; /* Light gray background */
      margin: 0;
      padding: 0;
      background-image: url('images/aaa.jpg');
    background-size: cover; /* Set the background size to cover the entire element */
    background-repeat: no-repeat;
    background-position: center;
    background-color: rgba(0, 0, 0, 0.5);
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
      color: black;
      text-align: center;
      /* background-color:lightblue; */
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #dddddd; /* Light gray border */
    }
    th {
      background-color:lightblue; /* Light gray background for table headers; /* Light gray background for table headers */
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
    .prescription-list {
  border: 1px solid #ddd;
  padding: 15px;
  border-radius: 5px;
}

  </style></head>
<body>
  <header class="bg-primary text-white"> <h1 class="container p-3">Welcome, Mr. <?php echo $username; ?></h1>
  </header>

  <main class="container mt-5">
    <section class="prescription-list">
      <h2>Your Pet's Prescriptions</h2>
      <?php if ($result->num_rows > 0) : ?>
        <table>
          <thead>
            <tr>
              <th>Name</th>
              <th>Diagnosis</th>
              <th>Medication</th>
              <th>Dosage</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
              <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['diagnosis']; ?></td>
                <td><?php echo $row['medication']; ?></td>
                <td><?php echo $row['dosage']; ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
        <br><br>
        <a href="downloadcsv.php" download="prescriptions.csv" class="btn btn-primary">Download Prescriptions (CSV)</a>
      <?php else : ?>
        <p>No prescriptions found for your pet.</p>
      <?php endif; ?>
    </section>
  </main>

  <footer class="bg-dark text-white p-3 text-center"> <a href="Userhome.php" class="btn btn-light">Back</a>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-f0fnxvbelzZHUqBKlXkYvOLSZfQjLqta7PWzupnLhwXDaftl4ubNTTwfIkNpIkzN" crossorigin="anonymous"></script>
</body>
</html>









