<?php
    session_start();
    // Check if the user is already logged in
    if(!isset($_SESSION['username'])) {
        // If not logged in, redirect to the login page
        header("Location: index.html");
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

  <title>VetCare</title>

  <!-- bootstrap core css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
</head>

<body>
   <!-- header section strats -->
    <!--header class="header_section -->
  <div class="hero_area ">
    <div class="hero_bg_box">
      <img src="images/hero-bg.jpg" alt="">
      
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" >
      
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html">
          <span>
            PetCare
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container-fluid" style="background-color: cornflowerblue; border-radius:20px;">

          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="usi.php">My Bookings</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewprescripiton.php">Prescription</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Services
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="chargesmanual.html">Charges Manual</a></li>
                <li><a class="dropdown-item" href="petcareinsights.html">Pet Care Insights</a></li>

              </ul>

            </ul>
      </div>
      <button style="border-radius: 20px;"><a href="?logout=1" class="logout">Logout</a></button>

    </nav>
   
    <!-- end header section -->



    <!-- slider section -->
    <section class="slider_section">
      <div class="container">
        <div class="row">
          <div class="col-md-5 ">
            <div class="detail-box">
              <h1>
                We Will Take Care <br>
                Of Your Pets
              </h1>
              <p>
                About VetCare

                  At VetCare, we are dedicated to bridging the gap in veterinary care for rural communities. We understand the challenges faced by pet owners living in remote areas, where access to quality veterinary services may be limited. Our mission is to provide accessible, affordable, and compassionate care for pets, regardless of geographic location.
                
              </p>
              <a href="userbooking.php">
                Book Consultant
              </a>
            </div>
          </div>
        </div>
      </div>
      
    </section>
    <!-- end slider section -->
  </div>

  <div class="main_content">
    <div class="main_content_bg">
      <img src="images/content-bg.jpg" alt="">
    </div>

    <!-- service section -->

    <section class="service_section layout_padding">
      <div class="container py_mobile_45">
        <div class="heading_container heading_center">
          <h2> Our Services </h2>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="box ">
              <div class="img-box">
                <img src="images/s1.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Pet Grooming
                </h5>
                <p>
                  Maintains coat cleanliness and health.
                  Reduces shedding and prevents skin issues.
                  Strengthens bond and comfort with handling.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box ">
              <div class="img-box">
                <img src="images/s2.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Pet Checkup
                </h5>
                <p>
                  Monitors overall health and detects issues early.
                  Includes physical exams, vaccinations, and preventive medications. 
                  Screens for underlying health conditions.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box ">
              <div class="img-box">
                <img src="images/s3.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Dental Care
                </h5>
                <p>
                  Vital for oral health and prevents dental problems.
                  Includes regular brushing, professional cleanings, and appropriate diet.
                  Reduces risk of plaque buildup, tartar, and periodontal disease.
                </p>
              </div>
            </div>
          </div>
        </div>
      
      </div>
    </section>

    <!-- end service section -->

    <!-- about section -->

    <!-- <section class="about_section ">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="img-box">
              <img src="images/about-img.jpg" alt="" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="detail-box">
              <div class="heading_container">
                <h2>
                  About Us
                </h2>
              </div>
              <p>
                About VetCare

                At VetCare, we are dedicated to bridging the gap in veterinary care for rural communities. We understand the challenges faced by pet owners living in remote areas, where access to quality veterinary services may be limited. Our mission is to provide accessible, affordable, and compassionate care for pets, regardless of geographic location.
              </p>
              <a href="demo.html">
                Read More
              </a>
            </div>
          </div>
        </div>
      </div>
    </section> -->

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

    <!-- end care section -->

    <!-- client section -->
    <section class="client_section">
      <div class="container">
        <div class="heading_container">
          <h2>
            Our Doctors
          </h2>
        </div>
        <div class="carousel-wrap ">
          <div class="owl-carousel">
            <div class="item">
              <div class="box">
                <div class="img-box">
                  <img src="images/Doc3.jpg" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Dr. Ramesh Tupare <br>
                    <span>
                      Heart Specialist
                    </span>
                  </h5>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                  <p>
                    From Khanaper 
                  </p>
                  <div>
                    <button style="border-radius:20px"><a class="" href="#">Contact:+919164087259</a></button>
                    
                    <button style="border-radius:20px"><a class="" href="userbooking.php">Book</a></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box">
                <div class="img-box">
                  <img src="images/Doc1.jpg" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Dr. Rahul Atwadkar <br>
                    <span>
                      Hair Specialist
                    </span>
                  </h5>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                  <p>
                    From Patane
                  </p>
                  <div>
                    <button style="border-radius:20px"><a class="" href="#">Contact:+919164087259</a></button>
                    
                    <button style="border-radius:20px"><a class="" href="userbooking.php">Book</a></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box">
                <div class="img-box">
                  <img src="images/\Doc22.jpg" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Dr. Rohit Pote <br>
                    <span>
                      Skin Specialist
                    </span>
                  </h5>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                  <p>
                    From Khanapur
                  </p>
                  <div>
                    <button style="border-radius:20px"><a class="" href="#">Contact:+919164087259</a></button>
                    
                    <button style="border-radius:20px"><a class="" href="userbooking.php">Book</a></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- end client section -->

    <!-- contact section -->

    <section class="contact_section layout_padding">
      <div class="container">
        <div class="heading_container">
          <h2>Request A Call back</h2>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form_container">
              <form action="process_form.php" method="POST">
                <div>
                  <input type="text" name="full_name" placeholder="Full Name" required />
                </div>
                <div>
                  <input type="email" name="email" placeholder="Email" required />
                </div>
                <div>
                  <input type="text" name="phone_number" placeholder="Phone number" required />
                </div>
                <div>
                  <input type="text" name="message" class="message-box" placeholder="Message" />
                </div>
                <div class="d-flex">
                  <button type="submit">SEND</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-6">
            <div class="map_container">
              <div class="map">
                <div id="googleMap"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    

  <!-- end info section -->


  <!-- footer section -->
  <footer class="container-fluid footer_section ">
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


