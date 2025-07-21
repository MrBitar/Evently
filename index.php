<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>EVENTLY</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="../uploads/logo.png" rel="icon">
  <link href="../uploads/logo.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/public.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Impact
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<?php
include("home.php");
?>
<body class="index-page">

  <header id="header" class="header fixed-top">

   
    <div class="branding d-flex align-items-cente">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          <h1 class="sitename">EVENTLY</h1>
          <span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="index.php" class="active">Home<br></a></li>
            <li><a href="events.php">Events</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="#guides">Guides</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#contact">Contact Us</a></li>
            <?php
            if (!isset($_SESSION["memberId"])) {
                echo "
            <li><a href='login.php'>Sign In</a></li>
          ";
           }else{
                $memberId = $_SESSION['memberId'];
                if (!isset($_SESSION["memberPhoto"]) && !isset($_SESSION["memberName"])) {
                    echo "
                    <li><a href='login.php'>Sign In</a></li>
                  <i class='mobile-nav-toggle d-xl-none bi bi-list'></i>
                  ";
                }
                else{
                $memberPhoto = $_SESSION['memberPhoto'];
                $memberName = $_SESSION['memberName'];
                echo "
                
                <li class='dropdown'><a href=''><span>$memberName</span> <i class='bi bi-chevron-down toggle-dropdown'></i></a>
              <ul>
                <li><a href='logout.php'>Logout</a></li>
                  <ul>
            </li>
            ";
          }
        }
          ?>
          <i class='mobile-nav-toggle d-xl-none bi bi-list'></i>

        </nav>

      </div>

    </div>

  </header>

  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section accent-background">

      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5 justify-content-between">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h2><span>Welcome to </span><span class="accent">Evently</span></h2>
            <p>Experiences Like Never Before</p>
            <div class="d-flex">
              <a href="#generalInfo" class="btn-get-started">Get Started</a>
            </div>
          </div>
          <div class="col-lg-5 order-1 order-lg-2">
            <img src="../banners/<?=$homeBanner?>" class="img-fluid" alt="">
          </div>
        </div>
      </div>

      <div class="icon-boxes position-relative" data-aos="fade-up" data-aos-delay="200">
        <div class="container position-relative">
          <div class="row gy-4 mt-5">

            <div class="col-xl-6 col-md-6">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-easel"></i></div>
                <h4 class="title"><a href="#events" class="stretched-link">Latest Events</a></h4>
              </div>
            </div><!--End Icon Box -->

            <div class="col-xl-6 col-md-6">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-geo-alt"></i></div>
                <h4 class="title"><a href="https://maps.app.goo.gl/UXtVZKK5jGVGx1tH9" target="_blank" class="stretched-link">Our Office</a></h4>
              </div>
            </div><!--End Icon Box -->

           
            </div><!--End Icon Box -->

          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="generalInfo" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Who Are We<br></h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3>We make your vision a reality</h3>
            <img src="../banners/<?=$generalInfoBanner1?>" class="img-fluid rounded-4 mb-4" alt=""><?=$generalInfo1?></p>
            <p><?=$generalInfo2?></p>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
            <div class="content ps-0 ps-lg-5">
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> <span>Fast</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Reliable</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Affordable</span></li>
              </ul>
              <p>
              <?=$generalInfo3?>
              </p>

              <div class="position-relative mt-4">
                <img src="../banners/<?=$generalInfoBanner2?>" class="img-fluid rounded-4" alt="">
                <a href="https://youtu.be/xvFZjo5PgG0?si=hlzw2y-XQ0rowH9b" class="glightbox pulsating-play-btn"></a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Clients Section -->
   
    <!-- Stats Section -->
    <section id="about" class="stats section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="container section-title" data-aos="fade-up">
        <h2>About Us</h2>
        <p><?=$about?></p>
      </div>
        <div class="row gy-4 align-items-center">

          <div class="col-lg-5">
            <img src="../banners/<?=$aboutUsBanner?>" alt="" class="img-fluid">
          </div>

          <div class="col-lg-7">

            <div class="row gy-4">

              <div class="col-lg-6">
                <div class="stats-item d-flex">
                  <i class="bi bi-emoji-smile flex-shrink-0"></i>
                  <div>
                    <span data-purecounter-start="0" data-purecounter-end="<?=$happy?>" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Happy Clients</strong></p>
                  </div>
                </div>
              </div><!-- End Stats Item -->

              <div class="col-lg-6">
                <div class="stats-item d-flex">
                  <i class="bi bi-journal-richtext flex-shrink-0"></i>
                  <div>
                    <span data-purecounter-start="0" data-purecounter-end="<?=$numOfEvents?>" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Events</strong></p>
                  </div>
                </div>
              </div><!-- End Stats Item -->

            </div>

          </div>

        </div>
        

      </div>

    </section><!-- /Stats Section -->
    <section id="events" class="services section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Latest Events</h2>
<h4><a href="events.php">Explore More...</a></h4>

</div><!-- End Section Title -->

<div class="container">

  <div class="row gy-4">

  <?php 
  $d=strtotime("yesterday");
  $date = date("Y-m-d",$d);
        $sql2 = "SELECT * FROM event_managment WHERE `date_from` >= '$date' AND `status`='active' ORDER BY `date_from` desc";
    $result2 = $conn-> query($sql2);
    if ($result2 -> num_rows > 0) {
        while ($row2 = $result2 -> fetch_assoc()) {
            $name = $row2["name"];
            $desc= $row2["description"];
            $dest = $row2["destination"];
            $eventID = $row2["event_id"];
            
                                
            echo "
             

          <div class='col-lg-4 col-md-6' data-aos='fade-up' data-aos-delay='100'>
            <div class='service-item  position-relative'>
              <div class='icon'>
                <i class='bi bi-easel'></i>
              </div>
              <h3>$name</h3>
              <p><strong>Description:</strong> $desc.</p>
              <p><strong>Destination:</strong> $dest.</p>";
              if(isset($_SESSION["memberId"])) {
              echo "<a href='event.php?eventId=$eventID' class='readmore stretched-link'>Read more <i class='bi bi-arrow-right'></i></a>
            </div>
          </div>
                    ";
              }else{
                echo "<a href='events.php' class='readmore stretched-link'>Read more <i class='bi bi-arrow-right'></i></a>
            </div>
          </div>
                    ";
              }
                }
            }
        
    
?>

    

  </div>
</div>
</section>
    <!-- Team Section -->
    <section id="guides" class="team section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Our Guides</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
        <?php 
        $sql2 = "SELECT guide_id,user_id FROM guide_managment";
    $result2 = $conn-> query($sql2);
    if ($result2 -> num_rows > 0) {
        while ($row2 = $result2 -> fetch_assoc()) {
            $user_id = $row2["user_id"];
            $id= $row2["guide_id"];
            $sql = "SELECT * FROM user where user_id = $user_id";
            $result = $conn -> query($sql);
            if ($result -> num_rows > 0) {
                while ($row = $result -> fetch_assoc()) {
                    $guidesNames = $row["name"];
                    $guidesRole = $row["role"];
                    $sql3 = "SELECT `photo` FROM guide_managment WHERE `user_id`='$user_id'";
                    $result3 = $conn-> query($sql3);
                    if ($result3 -> num_rows > 0) {
                    while ($row3 = $result3 -> fetch_assoc()) {
                    $photo=$row3['photo'];
                        }}
                    echo "
            <div class='col-xl-3 col-md-6 d-flex' data-aos='fade-up' data-aos-delay='100'>
            <div class='member'>
              <img src='../uploads/$photo' class='img-fluid' alt=''>
              <h4>$guidesNames</h4>
              <span>$guidesRole</span>
              <div class='social'>
                <a href='https://x.com/$guidesNames' target='_blank'><i class='bi bi-twitter-x'></i></a>
                <a href='https://facebook.com/$guidesNames' target='_blank'><i class='bi bi-facebook'></i></a>
                <a href='https://instagram.com/$guidesNames' target='_blank'><i class='bi bi-instagram'></i></a>
                <a href='https://linkedin.com/$guidesNames' target='_blank'><i class='bi bi-linkedin'></i></a>
              </div>
            </div>
          </div>
                    ";
                }
            }
        }
    }
?>
        </div>

      </div>

    </section><!-- /Team Section -->
    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact Us</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gx-lg-0 gy-4">

          <div class="col-lg-12">
            <div class="info-container d-flex flex-column align-items-center justify-content-center">
              
                
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p>+961 <?=$phone2?></p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p>+961 <?=$phone1?></p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p><?=$email?></p>
                </div>
              </div><!-- End Info Item -->

              


        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer accent-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Evently</span>
          </a>
          <p><?=$about?></p>
          <div class="social-links d-flex mt-4">
          <a href='https://x.com/evently' target='_blank'><i class='bi bi-twitter-x'></i></a>
                <a href='https://facebook.com/evently' target='_blank'><i class='bi bi-facebook'></i></a>
                <a href='https://instagram.com/evently' target='_blank'><i class='bi bi-instagram'></i></a>
                <a href='https://linkedin.com/evently' target='_blank'><i class='bi bi-linkedin'></i></a>
              
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#hero">Home</a></li>
            <li><a href="#about">About us</a></li>
            <li><a href="#guides">Guides</a></li>
            <li><a href="#gneralInfo">General Info</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a >Weddings</a></li>
            <li><a >Graduation</a></li>
            <li><a >Hangouts</a></li>
            <li><a >Get Togethers</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p ><strong>Phone:</strong> <span>+961 <?=$phone1?></span></p>
          <p ><strong>Phone:</strong> <span>+961 <?=$phone2?></span></p>
          <p><strong>Email:</strong> <span><?=$email?></span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Evently</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>