<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
<?php
session_start();
?>
  <title>Profile</title>
  <!-- Favicons -->
  <link href="../uploads/logo.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="login.php" class="logo d-flex align-items-center w-auto">
                <img src="../uploads/logo.png" alt="">
                  <span class="d-none d-lg-block">EVENTLY</span>
                </a>
              </div><!-- End Logo -->
              <?php
              require_once("connection.php");
              if (!isset($_SESSION["memberId"])) {
                echo '<script type="text/javascript">alert("Something Went Wrong!");</script>';
echo "<script type='text/javascript'>window.location.href ='index.php';</script>";
           }else{
              $id = $_SESSION["memberId"];
                $sql = "SELECT * FROM member where `member_id` = '$id'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $email = $row["email"];
                    
                        
                        $name = $row['full_name'];
                        $memPhoto = $row['photo'];
                        $profession = $row['profession'];
                        $nationality=$row['nationality'];
                        $phone=$row['mobile_number'];
                        $emergency=$row['emergency_number'];
                }
              }
            }
              ?>
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Edit Your Account</h5>
                    <p class="text-center small">Enter your information</p>
                  
                  </div>

                  <form class="row g-3 needs-validation" action="updateMember.php" method="post" enctype="multipart/form-data" novalidate>

                  <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="../uploads/<?=$memPhoto?>" width="30%" alt="Profile" class="rounded">
                        <div class="pt-2">
                          <input type="file" class="form-control" id="photo" name="photo" accept="image/png, image/gif, image/jpeg"  class="btn btn-primary " title="Upload new profile image" >
                        </div>
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="name" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="name" value="<?=$name?>" required>
                      
                        <div class="invalid-feedback" id="invalid-name" name="invalid-name" >Please Enter Your Name.</div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<?=$email?>" required>
                        <div class="invalid-feedback" id="invalid-email" name="invalid-email" >Please Enter Your Email.</div>
                      </div>
                    </div>
                    
                    <div class="row mb-3">
                      <label for="profession" class="col-md-4 col-lg-3 col-form-label">Profession</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="profession" type="text" class="form-control" id="profession" value="<?=$profession?>" required>
                        <div class="invalid-feedback" id="invalid-role" name="invalid-role" >Please Enter Your Profession.</div>
                      </div>
                    </div><div class="row mb-3">
                      <label for="nationality" class="col-md-4 col-lg-3 col-form-label">Nationality</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nationality" type="text" class="form-control" id="nationality" value="<?=$nationality?>" required>
                        <div class="invalid-feedback" id="invalid-nationality" name="invalid-nationality" >Please Enter Your Nationality.</div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" onkeyup="checkNum()" type="number" class="form-control" id="phone" value="<?=$phone?>" required>
                        <div class="invalid-feedback" id="invalid-phone" name="invalid-phone" >Please Enter Your Phone Number.</div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="emergency" class="col-md-4 col-lg-3 col-form-label">Emergency Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="emergency" onkeyup="checkEmergency()" type="number" class="form-control" id="emergency" value="<?=$emergency?>" required>
                        <div class="invalid-feedback" id="invalid-emergency" name="invalid-emergency" >Please Enter Your Phone Number.</div>
                      </div>
                    </div>
                    <div class="text-center">
                    <input type="button" onclick='window.location.href = "events.php"' class="btn btn-primary" name="submit" id="submit" value="Back" />

                      <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit" />
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>
              </div>

  <!--            <div class="credits">
                 All the links in the footer should remain intact. 
                 You can delete the links only if you purchased the pro version. 
                 Licensing information: https://bootstrapmade.com/license/ 
                 Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ 
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>
            -->
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

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
  <script>
      const d = new Date();
    var today = formatDate(d);
    
    document.getElementById('joinDate').min = today;

    function chooseMember(e){
       var id = e.value;
window.location.href = "memberHome.php?memberId="+id;
    }
    function passValid(){
        
        var pass = document.getElementById('password');
        var passM = document.getElementById('invalid-password');
        
    if(pass.value.length < 8) {
     
        pass.classList.add("is-invalid");
        passM.textContent = "At Least 8 Characters!";
    
      } else {
        pass.classList.remove("is-invalid");
        pass.classList.add("is-valid");
      }
      }
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
      function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}
  </script>

</body>
<?php include "registerMember.php"?> 

</html>