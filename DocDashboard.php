<?php
    session_start();
    // Check if the user is already logged in
    if(!isset($_SESSION['doctorname'])) {
        // If not logged in, redirect to the login page
        header("Location: DocLog.html");
        exit(); // Stop further execution
    }
    
    // If logout is requested, destroy the session
    if(isset($_GET['logout'])) {
        session_destroy(); // Destroy the session
        echo "<script>alert('Logout Success'); window.location.href='index.html';</script>";
        exit(); // Stop further execution
    }
    ?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <title>PetCare</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

<!-- js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <style>
    
/* footer section*/

.footer_section {
  display: flex;
  flex-direction: column;
  justify-content: center;

}

.footer_section p {
  color: #1a1b1a;
  margin: 0;
  padding: 25px 0 20px 0;
  margin: 0 auto;
  text-align: center;
  font-size: 15px;
}

.footer_section a {
  color: #1a1b1a;
}

/* end footer section*/
  </style>

</head>

<body>
   <!-- header section strats -->
   
    <!--header class="header_section -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light" >
      
        <a class="navbar-brand" href="index.html">
          <span>
            PetCare
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="container-fluid" style="background-color: cornflowerblue; border-radius:20px;">
        <div class="collapse navbar-collapse" id="navbarSupportedContent" >
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Services
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="chargesmanual.html">Charges Manual</a></li>
                <li><a class="dropdown-item" href="petcareinsights.html">Pet Care Insights</a></li>

              </ul>
            </li>
           
          </ul>
        
       


        </div>
      </div>
      <button style="border-radius: 20px;"><a href="?logout=1" class="logout">Logout</a></button>

    </nav>
   
    <!-- end header section -->



   
   
  

  <div class="main_content">
    <div class="main_content_bg">
      <img src="images/content-bg.jpg" alt="">
    </div>

    <!-- service section -->

    <section class="service_section layout_padding">
      <div class="container py_mobile_45">
        <div class="heading_container heading_center">
          <h2> My Dashboard </h2>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="box ">
              <div class="img-box">
                <img src="images/download.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                 Appointment Requests
                </h5>
                <p>
                  <!-- Maintains coat cleanliness and health. -->
                 
                </p>
                <br>
                <button type="button" value="submit" onclick="window.location.href='DocDash.php'">Appointments</button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box ">
              <div class="img-box">
                <img src="images/notebook_9807230.png"  alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Appointment Schedule
                </h5>
                <p>
                  <!-- Monitors overall health and detects issues  -->
                
                </p>
                <br>
                <button type="button" value="submit" onclick="window.location.href='DocDash2.php'">Appointments Updates</button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box ">
              <div class="img-box">
                <img src="images/icons8-medical-doctor-64.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Prescriptions
                </h5>
                <p>
                  <!-- Vital for oral health and prevents  -->
                </p>
                <br>
                <button type="button" value="submit" onclick="window.location.href='prescription.php'">Prescriptions</button>
              </div>
            </div>
          </div>

          
        </div>
       
      </div>
    </section>

    <!-- end service section -->

    <!-- end about section -->

    <!-- care section -->

    <section class="care_section layout_padding">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="detail-box">
              <div class="heading_container">
                <h2>
                  Best Care For Your Pets
                </h2>
              </div>
              <p>
                
                "VetCare is a one-stop destination for optimal pet care. With expert advice, informative content, and easy-to-use features, we empower pet owners to provide the best possible care for their furry friends. From grooming tips to appointment scheduling, we're here to ensure your pet's well-being every step of the way."
              </p>
              <a href="contact.html">
                Contact Us
              </a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="img-box">
              <img src="images/care.jpg" alt="" />
            </div>
          </div>
        </div>
      </div>
    </section>

      <!-- info section -->

  <section class="info_section layout_padding2">
    <div class="info_container ">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-6 ">
            <h6>
              About
            </h6>
            <p  style="margin-left: 2em;">
              About VetCare

                At VetCare, we are dedicated to bridging the gap in veterinary care for rural communities. We understand the challenges faced by pet owners living in remote areas, where access to quality veterinary services may be limited. Our mission is to provide accessible, affordable, and compassionate care for pets, regardless of geographic location.</p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              Useful Link
            </h6>
            <div class="info_link-box">
              <ul>
                <li class="active">
                  <a href="index.html">
                    Home
                  </a>
                </li>
                <li>
                  <a href="about.html">
                    About
                  </a>
                </li>
                <li>
                  <a href="service.html">
                    Service
                  </a>
                </li>
                <li>
                  <a href="contact.html">
                    Contact
                  </a>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 ">
            <h6>
              Address
            </h6>
            <div class="contact_items">
              <a href="">
                <div class="item ">
                  <div class="img-box ">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                  </div>
                  <div class="detail-box">
                    <p>
                      Location
                    </p>
                  </div>
                </div>
              </a>
              <a href="">
                <div class="item ">
                  <div class="img-box ">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                  </div>
                  <div class="detail-box">
                    <p>
                      Call +91 8431772601
                    </p>
                  </div>
                </div>
              </a>
              <a href="">
                <div class="item ">
                  <div class="img-box ">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                  </div>
                  <div class="detail-box">
                    <p>
                      demo@gmail.com
                    </p>
                  </div>
                </div>
              </a>
            </div>
          </div>
         
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->
    
 




  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <p>
      &copy; <span id="displayDate"></span> All Rights Reserved. Design by
      <a href="https://html.design/">PetCare</a>
    </p>
  </footer>
  <!-- end  footer section -->

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <!-- End Google Map -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>

</body>

</html>


