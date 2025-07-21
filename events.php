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
            <li><a href="index.php#guides">Guides</a></li>
            <li><a href="index.php#about">About Us</a></li>
            <li><a href="index.php#contact">Contact Us</a></li>
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
        <br /><br />
    <!-- Blog Posts Section -->
    <section id="events" class="blog-posts section">
      <div class="container">
        <div class="row gy-4">
        <?php 
         $sql = "SELECT * FROM event_managment WHERE `status` = 'active' ORDER BY `date_from` DESC";
         $result = $conn -> query($sql);
         if ($result -> num_rows > 0) {
             while ($row = $result -> fetch_assoc()) {
                $id = $row["event_id"];
                 $name = $row["name"];
                 $dest = $row["destination"];
                 $dateFrom = $row["date_from"];
                 $newDate = date("d-m-Y", strtotime($dateFrom));

                 $desc = $row['description'];
                 $category=$row['category'];
                 $photo = $row['photo'];
                 $sql2 = "SELECT * FROM guide_managment WHERE `event_id` = '$id'";
         $result2 = $conn -> query($sql2);
         if ($result2 -> num_rows > 0) {
             while ($row2 = $result2 -> fetch_assoc()) {
                    $guidePhoto = $row2["photo"];
                    $guideId = $row2['user_id'];
                    $sql3 = "SELECT * FROM user WHERE `user_id` = '$guideId'";
                    $result3 = $conn -> query($sql3);
                    if ($result3 -> num_rows > 0) {
                        while ($row3 = $result3 -> fetch_assoc()) {
                               $guideName = $row3["name"];
                        }
                    }
                }
            }else{
                $guideName = "No Guides Assigned";
                $guidePhoto = "default.png";
            }
                 if(isset($_SESSION['memberId'])) {
                    echo "
                    <div class='col-lg-4'>
                <article>
                  <div class='post-img'>
                    <img src='../uploads/$photo' alt='' class='img-fluid'>
                  </div>
                <h2 class='title'>
                    <a >$name</a>
                  </h2>
                  <p class='post-category'>$desc</p>
                  <p class='post-category'>$category</p>
                  <p class='post-category'><i class='bi bi-geo-alt'>$dest</i></p>

    
                 
    
                  <div class='d-flex align-items-center'>
                    <img src='../uploads/$guidePhoto' alt='' class='img-fluid post-author-img flex-shrink-0'>
                    <div class='post-meta'>
                      <p class='post-author'>$guideName</p>
                      <p class='post-date'>
                        <time datetime='$newDate'>$newDate</time>
                      </p>
                    </div>
                  </div>
                  <br>
                    <div><a href='event.php?eventId=$id'>Explore More...</a></div>
                </article>
              </div><!-- End post list item -->";
                 }
                 else{
                    echo "
                    <div class='col-lg-4'>
                <article>
                  <div class='post-img'>
                    <img src='../uploads/$photo' alt='' class='img-fluid'>
                  </div>
                <h2 class='title'>
                    <a >$name</a>
                  </h2>
                  <p class='post-category'>$desc</p>
                  <p class='post-category'>$category</p>
                  <p class='post-category'><i class='bi bi-geo-alt'>$dest</i></p>

                    
                 
    
                  <div class='d-flex align-items-center'>
                    <img src='../uploads/$guidePhoto' alt='' class='img-fluid post-author-img flex-shrink-0'>
                    <div class='post-meta'>
                      <p class='post-author'>$guideName</p>
                      <p class='post-date'>
                        <time datetime='$newDate'>$newDate</time>
                      </p>
                    </div>
                  </div>
                  <br>
                    <div><a href='login.php'>Login to Explore More</a></div>
                </article>
              </div><!-- End post list item -->";
                 }
             }
            
         }else{
            echo "
            <div class='col-lg-4'>
        <article>
          <div class='post-img'>
            <img src='../uploads/defaultEvent.jpg' alt='' class='img-fluid'>
          </div>
<h2 class='title'>
            <a >NONE</a>
          </h2>
          <p class='post-category'>No Events Currently</p>

          

          <div class='d-flex align-items-center'>
            <img src='../uploads/default.png' alt='' class='img-fluid post-author-img flex-shrink-0'>
            <div class='post-meta'>
              <p class='post-author'>NONE</p>
              <p class='post-date'>
                <time datetime='0000-00-00'>00-00-000</time>
              </p>
            </div>
          </div>

        </article>
      </div><!-- End post list item -->";
         }
        /*
          
            */
            ?>

        </div>
      </div>

    </section><!-- /Blog Posts Section -->

    <!-- Blog Pagination Section -->
  
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