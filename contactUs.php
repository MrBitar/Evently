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
include("generalInfoEdit.php");
include("addEvent.php");
include("contactUsEdit.php");
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
                  <button class="nav-link active " name="profile-edit-link" id="profile-edit-link" data-bs-toggle="tab" onclick="location.href = 'contactUs.php';" >Contact Us</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link " name="profile-edit-link" id="profile-edit-link" data-bs-toggle="tab" onclick="location.href = 'generalInfo.php';">General Info</button>
                </li>
                
                <li class="nav-item">
                  <button class="nav-link " data-bs-toggle="tab" onclick="location.href = 'banner.php';">Banners</button>
                </li>
               

              </ul>
              <div class="tab-content pt-2">
                

                  <!-- Profile Edit Form -->
                 
                  
                <div class="tab-pane fade active show  profile-edit pt-3" id="add-admins">
                 
                  <!-- Settings Form -->
                  <form action="contactUsEdit.php" class="row g-3 needs-validation" method="post" novalidate enctype="multipart/form-data">
                  
                  <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="email" value="<?=$_SESSION["contactEmail"]?>" required>
                        <div class="invalid-feedback" id="invalid-email" name="invalid-email" >Please Enter Your Email.</div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Primary Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" onkeyup="checkNum()" type="number" class="form-control" id="phone" value="<?=$_SESSION["contactPhone"]?>" required>
                        <div class="invalid-feedback" id="invalid-phone" name="invalid-phone" >Please Enter Your Phone Number.</div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="emergency" class="col-md-4 col-lg-3 col-form-label">Secondary Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="emergency" onkeyup="checkEmergency()" type="number" class="form-control" id="emergency" value="<?=$_SESSION["contactEmergency"]?>" required>
                        <div class="invalid-feedback" id="invalid-emergency" name="invalid-emergency" >Please Enter Your Phone Number.</div>
                      </div>
                    </div>
                    <div class="text-center">
                      <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit"/>
                    </div>
                  </form><!-- End settings Form -->
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
  
    function checkNum(){
        var number = document.getElementById('phone');
        var phone = number.value;
        var numberM = document.getElementById('invalid-phone');
        var phoneno = /^\d{8}$/;
  if((phone.match(phoneno)))
        {  
            number.classList.remove("is-invalid");
            number.classList.add("is-valid");
        }else{
            number.classList.remove("is-valid");
            number.classList.add("is-invalid");
        numberM.textContent = "8 Digits Only";

        }
   
      }
      
      function checkEmergency(){
        var number = document.getElementById('emergency');
        var phone = number.value;
        var numberM = document.getElementById('invalid-emergency');
        var phoneno = /^\d{8}$/;
  if((phone.match(phoneno)))
        {  
            number.classList.remove("is-invalid");
            number.classList.add("is-valid");
        }else{
            number.classList.remove("is-valid");
            number.classList.add("is-invalid");
        numberM.textContent = "8 Digits Only";

        }
   
      }
      
</script>
</html>