<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Guides</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../uploads/logo.png" rel="icon">

  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
<?php include("adminHome.php");
include("adminEdit.php");
include("addAdmin.php");
include("deleteAdmin.php");
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
<?php include("guideNav.php");?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>GUIDES</h1>
      
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
 
        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
              <li class="nav-item">
                  <button class="nav-link " name="profile-edit-link" id="profile-edit-link" data-bs-toggle="tab" onclick="location.href = 'guides.php';" data-bs-target="home.php">Edit Guides</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link " id="add-admin-link" data-bs-toggle="tab" onclick="location.href = 'addGuides.php';" data-bs-target="#add-admins">Add Guides</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" onclick="location.href = 'deleteGuide.php';" data-bs-target="deleteGuides.php">Delete Guides</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade active show pt-3 profile-edit" id="delete-admin">
                  <!-- Change Password Form -->
                  <form action="guideDelete.php" class="row g-3 needs-validation" method="post" novalidate>
                 
                    <div class="row mb-3">
                      <label for="adminEmail" class="col-md-4 col-lg-3 col-form-label">Guide's Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="adminEmail" type="email" class="form-control" id="adminEmail" value="<?= $email?>" required>
                        <div class="invalid-feedback" id="invalid-adminEmail" name="invalid-adminEmail" >Please Enter Email</div>
                      
                    </div>
                    </div>

                    <div class="row mb-3">
                      <label for="adminPassword" class="col-md-4 col-lg-3 col-form-label">Guide's Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="adminPassword" onkeyup="passValide()" type="password" class="form-control " id="adminPassword" required>
                        <div class="invalid-feedback" id="invalid-adminPassword" name="invalid-adminPassword" >Please Enter Password</div>
                      
                    </div>
                    </div>

                    <div class="row mb-3">
                      
                      

                    <div class="text-center">
                      <button type="submit" class="btn btn-danger" name="submit" id="submit">Delete Guide</button>
                    </div>
                    </div>
                  </form><!-- End Change Password Form -->

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

    function passValide(){
        
    var pass = document.getElementById('adminPassword');
    var passM = document.getElementById('invalid-adminPassword');
    
if(pass.value.length < 8) {
 
    pass.classList.add("is-invalid");
    passM.textContent = "At Least 8 Characters!";

  } else {
    pass.classList.remove("is-invalid");
    pass.classList.add("is-valid");
  }
  }
</script>


</html>