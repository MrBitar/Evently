<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MEMBERS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../uploads/logo.png" rel="icon">

  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
<?php 
include("adminHome.php");
include("memberHome.php");
include("membersEdit.php");
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
<?php include("membersNav.php");?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>MEMBERS</h1>
      
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
 
        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
              <li class="nav-item">
                  <button class="nav-link " name="profile-edit-link" id="profile-edit-link" data-bs-toggle="tab" onclick="location.href = 'members.php';" data-bs-target="home.php">Edit Members</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" id="add-admin-link" data-bs-toggle="tab" onclick="location.href = 'deleteMember.php';" data-bs-target="#add-admins">Delete Members</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link active " data-bs-toggle="tab" onclick="location.href = 'joined.php';" data-bs-target="delete.php">Joined Events</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link " data-bs-toggle="tab" onclick="location.href = 'fullMembers.php';" >Full Members</button>
                </li>
              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade active show  profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <div class="row mb-3">
                      <label for="chooseMember" class="col-md-4 col-lg-3 col-form-label">Choose Member</label>
                      <div class="col-md-8 col-lg-9">
                        <select onchange="chooseMemberToView(this)" name="chooseMember" type="select" class="form-control" id="chooseMember" >
                        <option default>None</option>
                        <?php getMembers();?>    
                    </select>
                      </div>
                    </div>
                    <br>
                    <form action="view.php" class="row g-3 needs-validation" method="post" novalidate>
                 
                    <?php 
                      if(isset($_GET["memberIdToView"])){
                        $member_id = $_GET["memberIdToView"];
                        require_once("connection.php");
                        $sql = "SELECT full_name FROM member where member_id = $member_id";
                        $result = $conn -> query($sql);
                        if ($result -> num_rows > 0) {
                            while ($row = $result -> fetch_assoc()) {
                                $name = $row["full_name"];}}

                        echo "
                        <div class='row mb-3'>
                        <label for='none' class='col-md-4 col-lg-3 col-form-label'>MEMBER</label>
                          <div class='col-md-8 col-lg-9'>
                            <input name='none' type='text' class='form-control' readonly id='none' value='$name' required>
                            </div>
                        </div>";
                        $sql = "SELECT event_id FROM event_member where member_id = $member_id";
                         $result = $conn -> query($sql);
                         if ($result -> num_rows > 0) {
                             while ($row = $result -> fetch_assoc()) {
                                 $event_id = $row["event_id"];
                                 $sql2 = "SELECT name FROM event_managment where event_id = $event_id";
                         $result2 = $conn -> query($sql2);
                         if ($result2 -> num_rows > 0) {
                          while ($row2 = $result2 -> fetch_assoc()) {
                            $event_name = $row2['name'];
                            echo "
                            <div class='row mb-3'>
                            <label for='$event_name' class='col-md-4 col-lg-3 col-form-label'>EVENT</label>
                              <div class='col-md-8 col-lg-9'>
                                <input name='$event_name' type='text' class='form-control' readonly id='$event_name' value='$event_name' required>
                                </div>
                            </div>";                               
                                     }
                          }                                                                                       
                             }
                         }
                        
                         
                        else{
                          echo "
                          <div class='row mb-3'>
                          <label for='none' class='col-md-4 col-lg-3 col-form-label'>EVENTS</label>
                            <div class='col-md-8 col-lg-9'>
                              <input name='none' type='text' class='form-control' readonly id='none' value='No Events Found' required>
                              </div>
                          </div>"; 
                         }
                      }else{
                        echo "
                        <div class='row mb-3'>
                        <label for='none' class='col-md-4 col-lg-3 col-form-label'>EVENTS</label>
                          <div class='col-md-8 col-lg-9'>
                            <input name='none' type='text' class='form-control' readonly id='none' value='No Events Found' required>
                            </div>
                        </div>"; 
                         }
                     ?>
                    
                  </form><!-- End Change Password Form -->


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

    function chooseMemberToView(e){
       var id = e.value;
window.location.href = "joined.php?memberIdToView="+id;
    } 
</script>

</html>