<?php
require('db.php');
ob_clean(); 
$query = "SELECT name, diagnosis, medication, dosage FROM prescription"; // Select specific columns
$csv_output = "";

$result = $con->query($query); // Execute the query

if ($result && $result->num_rows > 0) { // Check for successful execution and data
  $header_row = array("name", "diagnosis", "medication", "dosage");
  $csv_output .= implode(",", $header_row) . "\n"; // Add header row

  while ($row = $result->fetch_assoc()) {
    $csv_data = array($row['name'], $row['diagnosis'], $row['medication'], $row['dosage']);
    $csv_output .= implode(",", $csv_data) . "\n";
  }

  // Set headers to force download as CSV
  header("Content-type: text/csv");
  header("Content-Disposition: attachment; filename=prescriptions.csv");
  header("Content-Transfer-Encoding: UTF-8"); // Set UTF-8 encoding

  // Echo the CSV content to download
  echo $csv_output;
  exit;
}
?>
