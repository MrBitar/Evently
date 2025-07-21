<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
<?php
session_start();
?>
  <title>Event</title>
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
              
              if(isset($_GET["eventId"])){
                $id = $_GET['eventId'];
                $_SESSION['event_id']=$id;
         $sql = "SELECT * FROM event_managment WHERE `event_id` = '$id'";
         $result = $conn -> query($sql);
         if ($result -> num_rows > 0) {
             while ($row = $result -> fetch_assoc()) {
                $id = $row["event_id"];
                 $name = $row["name"];
                 $dest = $row["destination"];
                 $dateFrom = $row["date_from"];
                 $dateTo = $row['date_to'];
                 $desc = $row['description'];
                 $category=$row['category'];
                 $photo = $row['photo'];
                 $cost = $row['cost'];                  
                }
                $memberId = $_SESSION['memberId'];
                $sql2 = "SELECT * FROM request WHERE `event_id` = '$id' AND `member_id`='$memberId'";
                $result2 = $conn -> query($sql2);
                if ($result2 -> num_rows > 0) {
                    while ($row2 = $result2 -> fetch_assoc()) {
                        $request = $row2["status"];
                    }
                }else{
                    $request = "request";
                }
                }
            }else{

                echo '<script type="text/javascript">alert("Something went wrong!");</script>'; 
                echo '<script type="text/javascript">location.href = "events.php";</script>';
            }
            ?>

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Check <?=$name?> </h5>
                    <p class="text-center small">Check This Event</p>
                  
                  </div>

                  <form class="row g-3 needs-validation" action="request.php" method="post" enctype="multipart/form-data" novalidate>
                  <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Event Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="../uploads/<?=$photo?>" alt="Profile" width="250px" class="rounded">
                       
                      </div>
                    </div>

                  <div class="row mb-3">
                      <label for="name" class="col-md-4 col-lg-3 col-form-label">Event Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" readonly type="text" class="form-control" id="name" value="<?=$name?>" required>
                      
                        </div>
                    </div>
                    <!-- Profile Edit Form -->
                  <div class="row mb-3">
                      <label for="category" class="col-md-4 col-lg-3 col-form-label">Category</label>
                      <div class="col-md-8 col-lg-9">
                        <input  name="category" readonly type="text" value='<?=$category?>' class="form-control" id="category" >
                        
                      </div>
                    </div>
                    <br>
                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Destination</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="dest" readonly type="text" class="form-control" id="dest" value="<?=$dest?>" required>
                      </div>
                    </div>
                    
                    <div class="row mb-3">
                      <label for="dateFrom" class="col-md-4 col-lg-3 col-form-label">Date-From</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="dateFrom" readonly type="date" class="form-control" id="dateFrom"  value="<?=$dateFrom?>" required>
                      </div>
                    </div>
                
                    <div class="row mb-3">
                      <label for="dateTo" class="col-md-4 col-lg-3 col-form-label">Date-To</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="dateTo" type="date" class="form-control" id="dateTo"  value="<?=$dateTo?>" readonly required>
                      </div>
                    </div>
                    
              
                    <div class="row mb-3">
                      <label for="cost" class="col-md-4 col-lg-3 col-form-label">Cost</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="cost" type="number" class="form-control" id="cost" value="<?=$cost?>" readonly required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="description" class="col-md-4 col-lg-3 col-form-label">Description</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="description" class="form-control" id="description" style="height: 100px" readonly> <?=$desc?> </textarea>
                      </div>
                    </div>
                   
                    <div class="text-center">
                    <input type="button" onclick='window.location.href = "events.php"' class="btn btn-primary" name="submit" id="submit" value="Back" />
                    <?php
                    if($request == 'Approved'){
                    echo "
                        <input type='button'  class='btn btn-success' name='submit' id='submit' value='Approved' readonly />
                    ";
                        }else if($request == 'Denied'){
                            echo "
                                <input type='button'  class='btn btn-danger' name='submit' id='submit' value='Denied' readonly />
                            ";
                                }else if($request == 'Pending'){
                                    echo "
                                        <input type='button'  class='btn btn-warning' name='submit' id='submit' value='Pending' readonly />
                                    ";
                                        }
                                        else if($request == 'request'){
                                            echo "
                                                <input type='submit'  class='btn btn-primary' name='submit' id='submit' value='Request' />
                                            ";
                                                }
                        ?></div>
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