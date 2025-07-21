<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../uploads/logo.png" rel="icon">

  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
<?php include("adminHome.php");
include("adminEdit.php");
include("addAdmin.php");
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

<?php include("adminNav.php");?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>ADMINS</h1>
      
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
 
        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link" name="profile-edit-link" id="profile-edit-link" data-bs-toggle="tab" onclick="location.href = 'home.php';" data-bs-target="home.php">Edit Admins</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link active" id="add-admin-link" data-bs-toggle="tab" onclick="location.href = 'add.php';" data-bs-target="#add-admins">Add Admins</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" onclick="location.href = 'delete.php';" data-bs-target="delete.php">Delete Admins</button>
                </li>

              </ul>
              <div class="tab-content pt-2">
                
                <div class="tab-pane fade active show  profile-edit pt-3" id="add-admins">
                  <?php include("addAdmin.php"); ?>
                  <!-- Settings Form -->
                  <form action="addAdmin.php" class="row g-3 needs-validation" method="post" novalidate enctype="multipart/form-data">

                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="../uploads/<?=$_SESSION["newImage"]?>" alt="Profile" class="rounded ">
                        <div class="pt-2">
                    <input class="form-control" type="file" name="myImage" id="myImage" accept="image/png, image/gif, image/jpeg"  title="Upload new profile image">
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="name" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="name" value="<?=$_SESSION["newName"]?>" required>
                      
                        <div class="invalid-feedback" id="invalid-name" name="invalid-name" >Please Enter Your Name.</div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<?=$_SESSION["newEmail"]?>" required>
                        <div class="invalid-feedback" id="invalid-email" name="invalid-email" >Please Enter Your Email.</div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="password" class="col-md-4 col-lg-3 col-form-label">Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" onkeyup="passValide()" class="form-control" id="password" value="<?=$_SESSION["newPassword"]?>" required>
                        <div class="invalid-feedback" id="invalid-password" name="invalid-password" >Please Enter Your password.</div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="role" class="col-md-4 col-lg-3 col-form-label">role</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="role" type="text" class="form-control" id="role" value="<?=$_SESSION["newRole"]?>" required>
                        <div class="invalid-feedback" id="invalid-role" name="invalid-role" >Please Enter Your Role.</div>
                      </div>
                    </div><div class="row mb-3">
                      <label for="gender" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="gender" type="text" class="form-control" id="gender" value="<?=$_SESSION["newGender"]?>" required>
                        <div class="invalid-feedback" id="invalid-gender" name="invalid-gender" >Please Enter Your Gender.</div>
                      </div>
                    </div><div class="row mb-3">
                      <label for="dateofbirth" class="col-md-4 col-lg-3 col-form-label">date Of Birth</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="date" type="date" class="form-control" min="1940-03-15" max="2006-03-15" id="date" value="<?=$_SESSION["newDateOfBirth"]?>" required>
                        <div class="invalid-feedback" id="invalid-date" name="invalid-date" >Please Enter Your Birth Date.</div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="number" class="form-control" id="phone" value="<?=$_SESSION["newPhone"]?>" required>
                        <div class="invalid-feedback" id="invalid-phone" name="invalid-phone" >Please Enter Your Phone Number.</div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px"><?=$_SESSION["newAbout"]?></textarea>
                        <div class="invalid-feedback" id="invalid-about" name="invalid-about" >Please Enter Your About.</div>
                      </div>
                    </div>
                    <div class="text-center">
                      <input type="submit" class="btn btn-primary" disabled name="submit" id="submit" value="Submit" />
                    </div>
                  </form><!-- End settings Form -->

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
    function chooseAdmin(e){
       var id = e.value;
window.location.href = "adminHome.php?id="+id;
    }
    function passValide(){
        
        var pass = document.getElementById('password');
        var passM = document.getElementById('invalid-password');
        
    if(pass.value.length < 8) {
     
        pass.classList.add("is-invalid");
        passM.textContent = "At Least 8 Characters!";
    
      } else {
        pass.classList.remove("is-invalid");
        pass.classList.add("is-valid");
        var pass = document.getElementById('submit').disabled = false;

      }
      }

</script>

</html>