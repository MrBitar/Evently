<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CONTENT</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../uploads/logo.png" rel="icon">

  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
<?php include("eventHome.php");
include("aboutUs.php");
include("addEvent.php");
?>
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

 <?php include("contentNav.php");?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>CONTENT</h1>
      
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
 
        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
              <li class="nav-item">
                  <button class="nav-link " name="profile-edit-link" id="profile-edit-link" data-bs-toggle="tab" onclick="location.href = 'content.php';" >About Us</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link " name="profile-edit-link" id="profile-edit-link" data-bs-toggle="tab" onclick="location.href = 'contactUs.php';" >Contact Us</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link " name="profile-edit-link" id="profile-edit-link" data-bs-toggle="tab" onclick="location.href = 'generalInfo.php';">General Info</button>
                </li>
                
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" onclick="location.href = 'banner.php';">Banners</button>
                </li>
               

              </ul>
              <div class="tab-content pt-2">
                

                  <!-- Profile Edit Form -->
                 
                  
                <div class="tab-pane fade active show  profile-edit pt-3" id="add-admins">
                 
                  <!-- Settings Form -->
                  <div class='row mb-3'>
                  <label  class='col-md-4 col-lg-3 col-form-label'>Section</label>
                  <label  class='col-md-4 col-lg-3 col-form-label'>Banner</label> 
                  <hr>   
</div>
                  <?php 
                        require_once("connection.php");
    // check for members 
    $sql = "SELECT * FROM banners where 1";
    $result = $conn -> query($sql);
    $count=0;
    if ($result -> num_rows > 0) {
    while ($row = $result -> fetch_assoc()) {
    $banner = $row["banner"];
    $section = $row["section"];
    $bannerId = $row['id'];
    echo "<div class='row mb-3'>
             <form action='bannerEdit.php'  class='row g-3 needs-validation' method='post'  enctype='multipart/form-data'>
                      <label for='$bannerId' class='col-md-4 col-lg-3 text-warning col-form-label'>$section</label>
                      <div class='col-md-8 col-lg-9'>
                        <img src='../banners/$banner' alt='Profile' class='rounded '>
                        <div class='pt-2'>
                          <input type='file' class='col-4 form-control'  id='$bannerId' name='$bannerId' accept='image/png, image/gif, image/jpeg'   title='Upload new banner' required />                      
                          <input type='text' hidden value='$bannerId' name='bannerId' id='$bannerId' name='$bannerId' accept='image/png, image/gif, image/jpeg'  class='btn btn-primary ' title='Upload new banner' required />                      
                          <div class='pt-2'>
                          <input type='submit'  id='$bannerId'  class='btn btn-success' value='Change' />
                        </form>
                        </div>
                          </div>
                      </div>
        </div>
        <hr>";
        $count++;
    }
  } else {echo "<div class='row mb-3'>
             
    <label for='profileImage' class='col-md-4 col-lg-3 col-form-label'>Banner</label>
    <div class='col-md-8 col-lg-9'>
      <img src='../uploads/default.png' alt='Profile' class='rounded '>
      <div class='pt-2'>
        <input type='text'  readonly  value='No Banners Found' >
      </div>
    </div>
</div>";}
                      
                     ?>




                </div>

                
                </div>


                </div>

              

            
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
   <!-- <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>-->
   <!-- <div class="credits">
       All the links in the footer should remain intact. 
       You can delete the links only if you purchased the pro version. 
       Licensing information: https://bootstrapmade.com/license/ 
       Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ 
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
    -->
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>
<script>
function sendId(e){
  window.location.href = "bannerEdit.php?bannerId="+e;

}
</script>

</html>