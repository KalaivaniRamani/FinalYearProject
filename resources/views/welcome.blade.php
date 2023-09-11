<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>House Rental Management System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logoUMP.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizPage - v5.10.1
  * Template URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid">

      <div class="row justify-content-center align-items-center">
        <div class="col-xl-11 d-flex align-items-center justify-content-between">

        <a href="#" class="brand">
            <img src="assets/img/logo/logoUMP.png" alt="Logo" />
        </a>
        <h1 class="logo"><a style="color:#136bbd">House Rental Management System</a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
              <li><a class="nav-link scrollto" href="#about">About</a></li>
              <li><a class="nav-link scrollto" href="#services">Services</a></li>
              <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
              <li><a class="nav-link scrollto" href="#team">Benefit</a></li>
              <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
              <li class="dropdown"><a href="#"><span>Login</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="{{ route('login') }}">UMP Admin</a></li>
                  <li><a href="{{ route('login') }}">Student</a></li>
                  <li><a href="{{ route('ownerauth.login') }}">House Owner</a></li>
                </ul>
              </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
        </div>
      </div>

    </div>
  </header><!-- End Header -->

  <!-- ======= hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url(assets/img/hero-carousel/1.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Welcome To Our Page</h2>
                <p class="animate__animated animate__fadeInUp">A house rental system for all the UMP students acknowledgement.</p>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/2.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Safe Time and Energy</h2>
                <p class="animate__animated animate__fadeInUp">It is easy to find all the details of available rental houses at one place.</p>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/3.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">All Time Service</h2>
                <p class="animate__animated animate__fadeInUp">Student access to the UMP HRMS system is available 24/7, so they can access it whenever they wish.</p>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/4.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Quick and Easy Understanding</h2>
                <p class="animate__animated animate__fadeInUp">A user-friendly interface that makes it easy for the users to understand how the system works.</p>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>About Us</h3>
          <p>This system provides UMP students with details about rental houses. Students at UMP are required to live in the UMP hostel for two years. After that, students will need to find their own rental houses to live in. This system allows students to book for their preferred rental house.</p>
         </header>

        <div class="row about-cols">

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="about-col">
              <div class="img">
                <img src="assets/img/aboutus/mission.png" alt="" class="img-fluid">
                <div class="icon"><i class="bi bi-bar-chart"></i></div>
              </div>
              <h2 class="title"><a>Our Mission</a></h2>
              <p>
               A key mission of our system is to provide our UMP students with the best available rental houses selection and the nearest rental houses available to them.
              </p>
            </div>
          </div>

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="about-col">
              <div class="img">
                <img src="assets/img/aboutus/plan.png" alt="" class="img-fluid">
                <div class="icon"><i class="bi bi-brightness-high"></i></div>
              </div>
              <h2 class="title"><a>Our Plan</a></h2>
              <p>
              It is our plan to assist those students who are struggling to find a suitable rental house near the UMP area and to make sure that no student is left without a place to stay.
              </p>
            </div>
          </div>

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="about-col">
              <div class="img">
                <img src="assets/img/aboutus/vision.png" alt="" class="img-fluid">
                <div class="icon"><i class="bi bi-calendar4-week"></i></div>
              </div>
              <h2 class="title"><a>Our Vision</a></h2>
              <p>
               We aim to be Govenrment Universities' most valuable system, where students can find and discover any rental house they want.
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action">
      <div class="container text-center" data-aos="zoom-in">
        <h3>UMP House Rental</h3>
        <p>Visit our website anytime you need to rent a house to find out more relevant and helpful information about the available houses close to UMP.</p>
      </div>
    </section><!-- End Call To Action Section -->

    <!-- ======= Services Section ======= -->
    <section id="services">
      <div class="container" data-aos="fade-up">

        <header class="section-header wow fadeInUp">
          <h3>Services</h3>
          <p>Many services are available to UMP students to help them find the right rental house near the university.</p>
        </header>

        <div class="row">

          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="bi bi-house"></i></div>
            <h4 class="title"><a>Student House Rental</a></h4>
            <p class="description">You are looking for a rental house but you are not finding one that suits your preference?</p>
          </div>
          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="bi bi-card-checklist"></i></div>
            <h4 class="title"><a>Owner Rental Service</a></h4>
            <p class="description">You have been trying to rent your house, but no one has come forward to rent it?</p>
          </div>
          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><i class="bi bi-cash"></i></div>
            <h4 class="title"><a>Best Price</a></h4>
            <p class="description">Are you looking for a rental house within your budget?</p>
          </div>
          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="bi bi-signpost"></i></div>
            <h4 class="title"><a>Convenience Distance</a></h4>
            <p class="description">Looking for a rental house near UMP?</p>
          </div>
          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><i class="bi bi-shield-check"></i></div>
            <h4 class="title"><a>Secure Data</a></h4>
            <p class="description">Concerned about the security of your personal information?</p>
          </div>
          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="400">
            <div class="icon"><i class="bi bi-hourglass-split"></i></div>
            <h4 class="title"><a>Safe Time</a></h4>
            <p class="description">You don't have time to find a rental house because you are too busy?</p>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->


    <!-- ======= Facts Section ======= -->
    <section id="facts">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Accommodation</h3>
          <p>Many UMP students who are in their third and fourth years may not be able to get hostel accommodation. Students should search for rental houses outside of UMP.</p>
        </header>

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="16527" data-purecounter-duration="1" class="purecounter"></span>
            <p>Students</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="121" data-purecounter-duration="1" class="purecounter"></span>
            <p>House Owners</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="6364" data-purecounter-duration="1" class="purecounter"></span>
            <p>Students Without Hostels</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="434" data-purecounter-duration="1" class="purecounter"></span>
            <p>Students With Vehicles</p>
          </div>

        </div>

      </div>
    </section><!-- End Facts Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3 class="section-title">Our Portfolio</h3>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class=" col-lg-12">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">Single Story</li>
            <li data-filter=".filter-web">Double Story</li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200" >

      @foreach($single as $singlehouses)
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <figure>
              <img src="/house_picture/{{ $singlehouses->house_picture }}" class="img-fluid" alt="">
              <a href="/house_picture/{{ $singlehouses->house_picture }}" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="For more information, please visit our page by login."><i class="bi bi-plus"></i></a>
            </figure>

            <div class="portfolio-info">
              <h4><a>{{$singlehouses->house_type}}</a></h4>
              <p>Owner Name : {{$singlehouses->owner_name}}</p>
            </div>
          </div>
        </div>
        @endforeach
      
        @foreach($double as $doublehouses)
        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-wrap">
            <figure>
              <img src="/house_picture/{{ $doublehouses->house_picture }}" class="img-fluid" alt="">
              <a href="/house_picture/{{ $doublehouses->house_picture }}" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="For more information, please visit our page by login"><i class="bi bi-plus"></i></a>
            </figure>

            <div class="portfolio-info">
              <h4><a>{{$doublehouses->house_type}}</a></h4>
              <p>Owner Name : {{$doublehouses->owner_name}}</p>
            </div>
          </div>
        </div>
        @endforeach

      </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3>Discover UMP</h3>
          <p>Why UMP is the best choice?</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <img src="assets/img/logo/UMPPic.png" class="img-fluid" alt="" style="height: 300px ;">
            </div>
          </div>

          <div class="col-lg-8 col-md-6">
            
            <h3><i><b>Advantages</b></i></h3>
            <span>UMP is a five-star engineering university. Each student is provided with a hostel for two years, which is equivalent to four semesters. This fact is not appreciated by the majority of us. The student will be required to find a rental house after 2 years. There are many houses in the area surrounding UMP Pekan, so students can prepare to look for one nearby.</span>
           
          </div>

      

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h3>Contact Us</h3>
        </div>

        <div class="row contact-info">

        
        <div class="row">

        <div class="col-lg-12 ">
            <iframe class="mb-4 mb-lg-0" src="https://maps.google.com/maps?q=Universiti%20Malaysia%20Pahang%2026600%20Pekan%20Pahang,%20Malaysia&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
        </div>

        </div>

          <div class="col-md-4">
            <div class="contact-address">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <address>Universiti Malaysia Pahang,26600 Pekan,Pahang, Malaysia</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="bi bi-phone"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+609 431 5000">Tel : +609 431 5000</a></p>
              <p><a href="tel:+609 431 5555">Fax : +609 431 5555</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><a href="mailto:pro@ump.edu.my">pro@ump.edu.my</a></p>
            </div>
          </div>

          </div>

    </div>
</section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>UMP HRMS</h3>
            <p>Students can find all the details on rental houses near UMP along with the extra features of this system to make it easy for the stundents to communicate with their landlords.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
            Universiti Malaysia Pahang,<br>
            26600 Pekan,Pahang,<br>
            Malaysia. <br>
              <strong>Phone:</strong> +609 431 5000<br>
              <strong>Phone:</strong> +609 431 5555<br>
              <strong>Email:</strong> pro@ump.edu.my<br>
            </p>

            <div class="social-links">
              <a href="https://twitter.com/umpmalaysia" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="https://www.facebook.com/universiti.malaysia.pahang/" class="facebook"><i class="bi bi-facebook"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Services</h4>
            <p>Students can view the rental house details as well as the home owner details.</p>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright 2022 <strong>Universiti Malaysia Pahang (Malaysia University)</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
      -->
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
