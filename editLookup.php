<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LOOKUPS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../uploads/logo.png" rel="icon">

  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
<?php include("eventHome.php");

include("addEvent.php");
include("eventDelete.php");
include("lookupAdd.php");
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
<?php include("lookupNav.php");?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>LOOKUP</h1>
      
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
 
        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
              <li class="nav-item">
                  <button class="nav-link " name="profile-edit-link" id="profile-edit-link" data-bs-toggle="tab" onclick="location.href = 'lookup.php';" >Add Lookup</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link active" name="profile-edit-link" id="profile-edit-link" data-bs-toggle="tab" onclick="location.href = 'editLookup.php';" >Edit Lookups</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link " name="profile-edit-link" id="profile-edit-link" data-bs-toggle="tab" onclick="location.href = 'deleteLookup.php';" >Delete Lookup</button>
                </li>
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade active show pt-3 profile-edit" id="delete-admin">
                  <!-- Change Password Form -->
                   <?php include("lookupGet.php");?>

                  
                  <div class="row mb-3">
                      <label for="lookupCodeEdit" class="col-md-4 col-lg-3 col-form-label">Choose Code</label>
                      <div class="col-md-8 col-lg-9">
                        <select  name="lookupCodeEdit" id="lookupCodeEdit"  onchange='getAllNames(this)' type="select" class="form-control" id="lookupCodeEdit" >
                        <option default>None</option>
                        <?php getLookupCode();?>    
                    </select>
                      </div>
                    </div>

                    
                    
                    <div class="row mb-3">
                      <label for="lookupNameEdit" class="col-md-4 col-lg-3 col-form-label">Choose Name</label>
                      <div class="col-md-8 col-lg-9">
                        <select onchange="getAllInfo(this)" name="lookupNameEdit" type="select" class="form-control" id="lookupNameEdit" >
                        <?php
                    echo "<option>None</option>";

                        if(isset($_GET["getCode"])){
                        include "connection.php";
                        $code = $_GET["getCode"];
                            $sql = "SELECT * FROM lookups_managment Where `code` = $code";
                            $result = $conn-> query($sql);
                            if ($result -> num_rows > 0) {
                            while ($row = $result -> fetch_assoc()) {
                            $getName= $row["name"];
                            $getId = $row["lookup_id"];
                            $getOrder = $row['lookup_order'];
                            $getCode = $row['code'];
                            
                    echo "<option  value='$getName-$getOrder-$getId-$getCode' name='$getId' id='$getId'>$getName</option>";
                   

                            
        }
    }     echo "<script>document.getElementById('lookupCodeEdit').value = '$code'</script>";
} 
                        ?>
                           
                    </select>
                      </div>
                    </div>
                    <br>
                    <form action="lookupEdit.php" class="row g-3 needs-validation" method="post" novalidate>
                 
                    
                    <div class="row mb-3">
                      <label for="lookupEditCode" class="col-md-4 col-lg-3 col-form-label">Enter Code</label>
                      <div class="col-md-8 col-lg-9">
                        <input  name="lookupEditCode" type="number" class="form-control" id="lookupEditCode"  required>
                        <div class="invalid-feedback" id="invalid-lookupEditCode" name="invalid-lookupEditCode" >Please Enter Code.</div>    
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="lookUpNameEdit" class="col-md-4 col-lg-3 col-form-label">Enter Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input  name="lookUpNameEdit" type="text" class="form-control" id="lookUpNameEdit"  required>
                        <div class="invalid-feedback" id="invalid-lookUpNameEdit" name="invalid-lookUpNameEdit" >Please Enter Name.</div>
                          
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="lookupOrderEdit" class="col-md-4 col-lg-3 col-form-label">Enter Order</label>
                      <div class="col-md-8 col-lg-9">
                        <input  name="lookupOrderEdit" type="text" class="form-control" id="lookupOrderEdit"  required>
                        <div class="invalid-feedback" id="invalid-lookupOrderEdit" name="invalid-lookupOrderEdit" >Please Enter Order.</div>
                          
                      </div>
                    </div>
                    <input  name="lookupIdEdit" type="number" hidden class="form-control" id="lookupIdEdit"  required>
                    
                    <div class="row mb-3">
                    <div class="text-center">
                      <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Edit" />
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
function getAllNames(e){
    window.location.href ="editLookup.php?getCode="+e.value; 
}
function getAllInfo(e){
    var text = e.value;
    var all = text.split("-");
    var name = all[0];
    var order = all[1];
    var id = all[2];
    var code = all[3];
    document.getElementById('lookupEditCode').value = code;
    document.getElementById('lookupOrderEdit').value = order;
    document.getElementById('lookUpNameEdit').value = name;
    document.getElementById('lookupIdEdit').value = id;
   
}
</script>


</html>