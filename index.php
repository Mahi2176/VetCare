<?php
require('db.php'); // Include your database connection

// Start session to maintain user login state
session_start();

// Check if user is logged in, if not redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
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
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                What We Do
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Vaccinations</a></li>
                <li><a class="dropdown-item" href="#">Normal Check-Up</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Med Insights</a></li>
              </ul>
            </li>
  <!--   
              <li class="nav-item">
                <button class="btnlog" style="border-radius: 20px;"><a class="nav-link" href="login.php">Login</a></button>
              </li>
              
              <li class="nav-item">
                <button class="btnlog" style="border-radius: 20px;" > <a class="nav-link" href="registration.php">Register</a></button>
              </li> -->
           
          </ul>
          <form class="d-flex ml-auto">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
          <button style="border-radius: 10px;"><a href="adminlogin.php" style="color: black;">Admin</a></button>
          <button style="border-radius: 10px;"><a href="DocReg.html" style="color: black;">Doctor</a></button>
          <button style="border-radius: 10px;"><a href="login.php" style="color: black;">User</a></button>

        </div>
      </div>
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
              <a href="demo.html">
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
        <div class="btn-box">
          <a href="read.html">
            Read More
          </a>
        </div>
      </div>
    </section>

    <!-- end service section -->

    <!-- about section -->

    <section class="about_section ">
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
    </section>

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
              <a href="demo.html">
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
            Testimonial
          </h2>
        </div>
        <div class="carousel-wrap ">
          <div class="owl-carousel">
            <div class="item">
              <div class="box">
                <div class="img-box">
                  <img src="images/c1.jpg" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Tushar Utturkar <br>
                    <span>
                      Pet Owner
                    </span>
                  </h5>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                  <p>
                    From Khanaper !!
                  </p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box">
                <div class="img-box">
                  <img src="images/c2.jpg" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Rupesh Bagave <br>
                    <span>
                      Pet Owner
                    </span>
                  </h5>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                  <p>
                    From Patane !!
                  </p>
                 
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
          <h2>
            Request A Call back
          </h2>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form_container">
              <form action="#">
                <div>
                  <input type="text" placeholder="Full Name " />
                </div>
                <div>
                  <input type="email" placeholder="Email" />
                </div>
                <div>
                  <input type="text" placeholder="Phone number" />
                </div>
                <div>
                  <input type="text" class="message-box" placeholder="Message" />
                </div>
                <div class="d-flex ">
                  <button>
                    SEND
                  </button>
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

    <!-- end contact section -->
  </div>

  <!-- info section -->

  <section class="info_section layout_padding2">
    <div class="info_container ">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 ">
            <h6>
              About
            </h6>
            <p>
              About VetCare

                At VetCare, we are dedicated to bridging the gap in veterinary care for rural communities. We understand the challenges faced by pet owners living in remote areas, where access to quality veterinary services may be limited. Our mission is to provide accessible, affordable, and compassionate care for pets, regardless of geographic location.</p>
          </div>
          <div class="col-md-6 col-lg-2 ">
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
          <div class="col-md-6 col-lg-3 ">
            <div class="info_form ">
              <h5>
                Newsletter
              </h5>
              <form action="#">
                <input type="email" placeholder="Enter your email">
                <button>
                  Subscribe
                </button>
              </form>
              <div class="social_box">
                <a href="">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-youtube" aria-hidden="true"></i>
                </a>
              </div>
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
      <a href="https://html.design/">Mahesh</a>
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