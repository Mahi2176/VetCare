


<?php
    session_start();
    // Check if the user is already logged in
    if(!isset($_SESSION['username'])) {
        // If not logged in, redirect to the login page
        header("Location: ../index.html");
        exit(); // Stop further execution
    }
    
    // If logout is requested, destroy the session
    if(isset($_GET['logout'])) {
        session_destroy(); // Destroy the session
        echo "<script>alert('Logout Success'); window.location.href='../index.html';</script>";
        exit(); // Stop further execution
    }
require('db.php');

// Assuming you have established a connection to your database
$query = "SELECT COUNT(*) AS numUsers FROM users";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$numUsers = $row['numUsers'];

$query = "SELECT COUNT(*) AS numDoctors FROM doctors";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$numDoctors = $row['numDoctors'];


$query = "SELECT * FROM appointments";
$result = $con->query($query);
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">

	<title>Admin VetCare</title>

</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">VetCareAdmin</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="admindash.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="appointments.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Appointments</span>
				</a>
			</li>
			<li>
				<a href="">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Appointment Schedule</span>
				</a>
			</li>
			<li>
				<a href="messege.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Callback Requests</span>
				</a>
			</li>
			<li>
				<a href="staff.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Staff</span>
				</a>
			</li>
		</ul>

		<ul class="side-menu">
            <li>
                <a href="?logout=1" class="logout">
                    <i class='bx bxs-log-out-circle' ></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
		
		<!-- <ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul> -->
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<!-- <nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="C:\Users\rupesh bagave\Desktop\VetCare\images\admin.JPG">
			</a>
		</nav> -->
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
					<h3><?php echo $numUsers; ?></h3>
						<p>Appoinment Requests</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>Happy Patients</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3><?php echo $numDoctors;?></h3>
						<p>Total Staff</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Messeges</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
                    <table>
        <tr>
            <th>User ID</th>
            <th>Full Name</th>
            <th>Phone number</th>
            <th>Appoinment Time</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['number']; ?></td>
                <td><?php echo $row['appointment_time']; ?></td>

                <td>
                    
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
				</div>
				
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="C:\xampp\htdocs\VetCare\adminscript.js"></script>
</body>
</html>
