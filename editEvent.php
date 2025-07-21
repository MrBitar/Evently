<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EVENTS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../uploads/logo.png" rel="icon">

  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
<?php include("eventHome.php");
 include("eventEdit.php");

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
<?php include("eventNav.php");?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>EVENTS</h1>
      
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
 
        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
              <li class="nav-item">
                  <button class="nav-link " name="profile-edit-link" id="profile-edit-link" data-bs-toggle="tab" onclick="location.href = 'events.php';" data-bs-target="home.php">Add Event</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link active" name="profile-edit-link" id="profile-edit-link" data-bs-toggle="tab" onclick="location.href = 'editEvent.php';" data-bs-target="home.php">Edit Event</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link " name="profile-edit-link" id="profile-edit-link" data-bs-toggle="tab" onclick="location.href = 'deleteEvent.php';" data-bs-target="home.php">Delete Event</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" id="add-admin-link" data-bs-toggle="tab" onclick="location.href = 'assign.php';" data-bs-target="#add-admins">Assign Guides</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link " data-bs-toggle="tab" onclick="location.href = 'publish.php';">Publish Events</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link " data-bs-toggle="tab" onclick="location.href = 'view.php';">View Members in Event</button>
                </li>

              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade active show  profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <div class="row mb-3">
                      <label for="chooseAdmin" class="col-md-4 col-lg-3 col-form-label">Choose Event</label>
                      <div class="col-md-8 col-lg-9">
                        <select onchange="chooseEvent(this)" name="selectAdmin" type="select" class="form-control" id="selectAdmin" >
                        <option default>None</option>
                        <?php getEvents();?>    
                    </select>
                      </div>
                    </div>
                    <br>
                  <form action="eventEdit.php" class="row g-3 needs-validation" method="post" novalidate enctype="multipart/form-data">
                  <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Event Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="../uploads/<?=$_SESSION['editPhotoEvent']?>" alt="Profile" class="rounded ">
                        <div class="pt-2">
                        <input class="form-control" type="file"  id="myImage" name="myImage" accept="image/png, image/gif, image/jpeg"  class="btn btn-primary " title="Upload new profile image" >
                        </div>
                      </div>
                    </div>

                  <div class="row mb-3">
                      <label for="name" class="col-md-4 col-lg-3 col-form-label">Event Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="name" value="<?=$_SESSION["editEvent"]?>" required>
                      
                        <div class="invalid-feedback" id="invalid-name" name="invalid-name" >Please Enter Event Name.</div>
                        </div>
                    </div>
                    <!-- Profile Edit Form -->
                  <div class="row mb-3">
                      <label for="category" class="col-md-4 col-lg-3 col-form-label">Category</label>
                      <div class="col-md-8 col-lg-9">
                        <select  name="category" type="select" class="form-control" id="category" >
                        <option default>None</option>
                        <?php getCategories();?>    
                    </select>
                    <div class="invalid-feedback" id="invalid-category" name="invalid-category" >Please Choose Category.</div>

                      </div>
                    </div>
                    <br>
                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Destination</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="dest" type="text" class="form-control" id="dest" value="<?=$_SESSION["editDest"]?>" required>
                        <div class="invalid-feedback" id="invalid-dest" name="invalid-dest" >Please Enter Destination.</div>
                      </div>
                    </div>
                    
                    <div class="row mb-3">
                      <label for="dateFrom" class="col-md-4 col-lg-3 col-form-label">Date-From</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="dateFrom" type="date" class="form-control" id="dateFrom" onchange="getDateTo()"  value="<?=$_SESSION["editDateFrom"]?>" required>
                        <div class="invalid-feedback" id="invalid-dateFrom" name="invalid-dateFrom" >Please Enter Strating Date.</div>
                      </div>
                    </div>
                
                    <div class="row mb-3">
                      <label for="dateTo" class="col-md-4 col-lg-3 col-form-label">Date-To</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="dateTo" type="date" class="form-control" id="dateTo"  value="<?=$_SESSION["editDateTo"]?>" required>
                        <div class="invalid-feedback" id="invalid-dateTo" name="invalid-dateTo" >Please Enter Ending Date.</div>
                      </div>
                    </div>
                    
              
                    <div class="row mb-3">
                      <label for="cost" class="col-md-4 col-lg-3 col-form-label">Cost</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="cost" type="number" class="form-control" id="cost" value="<?=$_SESSION["editCost"]?>" required>
                        <div class="invalid-feedback" id="invalid-cost" name="invalid-cost" >Please Enter the cost.</div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="description" class="col-md-4 col-lg-3 col-form-label">Description</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="description" class="form-control" id="description" style="height: 100px"><?=$_SESSION["editDesc"]?></textarea>
                        <div class="invalid-feedback" id="invalid-description" name="invalid-description" >Please Enter Description.</div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Status" class="col-md-4 col-lg-3 col-form-label">Status</label>
                      <div class="col-md-8 col-lg-9">
                        <select  name="status" type="select" class="form-control" id="status" >
                        <option default>Inactive</option>
                        <option >Active</option>
                        
                            
                    </select>
                    <div class="invalid-feedback" id="invalid-status" name="invalid-status" >Please Choose Status.</div>

                      </div>
                    </div>
                    <br>
                    <div class="text-center">
                      <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit" />
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
    function chooseEvent(e){
       var id = e.value;
window.location.href = "eventHome.php?id="+id;
    }
    function getDateTo(){
  var minD =   document.getElementById('dateFrom').value;

    document.getElementById('dateTo').min = minD;

}
</script>

</html>