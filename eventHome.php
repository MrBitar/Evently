<?php
session_start();
require_once "connection.php";


if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION['user_id'];
   
}
if (!isset($_SESSION['name'])) {
    $_SESSION['name']= '';
}
$sql2 = "SELECT * FROM user where user_id = $user_id";
$result2 = $conn -> query($sql2);
if ($result2 -> num_rows > 0) {

    while ($row = $result2 -> fetch_assoc()) {
        $name = $row["name"];
        $email = $row["email"];
        $password = $row["password"];
        $dateOfBirth = $row["dateOfBirth"];
        $gender = $row["gender"];
        $role = $row["role"];
    }
}
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION['user_id'];

}
$sql2 = "SELECT * FROM admin where user_id = $user_id";
$result2 = $conn -> query($sql2);
if ($result2 -> num_rows > 0) {

    while ($row = $result2 -> fetch_assoc()) {
        $image = $row["photo"];
        $about = $row["about"];
        $phone = $row["phone"];
    }
}

function getCategories(){
    include "connection.php";
   
       $sql2 = "SELECT `code`,`name` FROM lookups_managment WHERE code=1";
       $result2 = $conn-> query($sql2);
       if ($result2 -> num_rows > 0) {
           while ($row2 = $result2 -> fetch_assoc()) {
               $code = $row2["code"];
              $category = $row2["name"];
                       echo "<option  value='$category' id='$category'>$category</option>";
                   
               }
           }
       }
   
   
function getEvents(){
 include "connection.php";

    $sql2 = "SELECT `event_id`, `name` FROM event_managment";
    $result2 = $conn-> query($sql2);
    if ($result2 -> num_rows > 0) {
        while ($row2 = $result2 -> fetch_assoc()) {
            $name = $row2['name'];
            $event_id= $row2["event_id"];
            
                    echo "<option  value='$event_id' id='$event_id'>#$event_id, Name: $name</option>";
                
            
        }
    }

}
function getInactiveEvents(){
    include "connection.php";

    $sql2 = "SELECT `event_id`, `name` FROM event_managment WHERE status='Inactive'";
    $result2 = $conn-> query($sql2);
    if ($result2 -> num_rows > 0) {
        while ($row2 = $result2 -> fetch_assoc()) {
            $name = $row2['name'];
            $event_id= $row2["event_id"];
            
                    echo "<option  value='$event_id' id='$event_id'>#$event_id, Name: $name</option>";
                
            
        }
    }
}
function getGuides(){
    include "connection.php";
   
       $sql2 = "SELECT guide_id,user_id FROM guide_managment";
       $result2 = $conn-> query($sql2);
       if ($result2 -> num_rows > 0) {
           while ($row2 = $result2 -> fetch_assoc()) {
               $user_id = $row2["user_id"];
               $id= $row2["guide_id"];
               $sql = "SELECT * FROM user where user_id = $user_id";
               $result = $conn -> query($sql);
               if ($result -> num_rows > 0) {
                   while ($row = $result -> fetch_assoc()) {
                       $guidesNames = $row["name"];
                       $guidesEmails = $row["email"];
                       echo "<option  value='$user_id' id='$user_id'>#$user_id, Name: $guidesNames, Email: $guidesEmails</option>";
                   }
               }
           }
       }
   
   }
if (isset($_GET["id"])) {
    $id = $_GET['id'];
    include "connection.php";
          $sql = "SELECT * FROM event_managment where event_id = $id";
                $result = $conn -> query($sql);
                if ($result -> num_rows > 0) {
                    while ($row = $result -> fetch_assoc()) {
                        $name = $row["name"];
                        $dest = $row["destination"];
                        $dateFrom = $row["date_from"];
                        $dateTo = $row["date_to"];
                        $desc = $row['description'];
                        $cost = $row['cost'];
                        $status=$row['status'];
                        $category=$row['category'];
                        $photo = $row['photo'];
                        
                    }
                }
                
                $_SESSION["editPhotoEvent"] = $photo;
                $_SESSION["eventToEditId"] = $id;
                $_SESSION["editEvent"] = $name;
                $_SESSION["editDest"] = $dest;
                $_SESSION["editDateFrom"] = $dateFrom;
                $_SESSION["editDateTo"] = $dateTo;
                $_SESSION["editCost"] = $cost;
                $_SESSION["editDesc"] = $desc;

echo "<script>window.location.href = 'editEvent.php';</script>";
                
            }else{
               
            }
           

?>