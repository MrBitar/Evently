<?php
session_start();
require_once "connection.php";
$guideInfoFlag=0;

if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION['user_id'];
   
}
if (!isset($_SESSION['name'])) {
    $_SESSION['name']= '';
}if (!isset($_SESSION['email'])) {
    $_SESSION['email']= '';
}
if (!isset($_SESSION['password'])) {
    $_SESSION['password']= '';
}
if (!isset($_SESSION['gender'])) {
    $_SESSION['gender']= '';
}
if (!isset($_SESSION['role'])) {
    $_SESSION['role']= '';
}
if (!isset($_SESSION['imageGuide'])) {
    $_SESSION['imageGuide']= 'default.png';
}
if (!isset($_SESSION['about'])) {
    $_SESSION['about']= '';
}
if (!isset($_SESSION['phone'])) {
    $_SESSION['phone']= '';
}
if (!isset($_SESSION['dateOfBirth'])) {
    $_SESSION['dateOfBirth']= '';
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
          $sql = "SELECT * FROM user where user_id = $id";
                $result = $conn -> query($sql);
                if ($result -> num_rows > 0) {
                    while ($row = $result -> fetch_assoc()) {
                        $name2 = $row["name"];
                        $email2 = $row["email"];
                        $password2 = $row["password"];
                        $dateOfBirth2 = $row["dateOfBirth"];

                        $gender2 = $row["gender"];
                        $role2 = $row["role"];
                        $sql3 = "SELECT * FROM guide_managment where user_id = $id";
    $result3 = $conn -> query($sql3);
    if ($result3 -> num_rows > 0) {
    
        while ($row3 = $result3 -> fetch_assoc()) {
            $image2 = $row3["photo"];
            $about2 = $row3["about"];
            $phone2 = $row3["phone"];
        }
    }
                    }
                }
                $_SESSION["guideToEditId"] = $id;
                $_SESSION["name"] = $name2;
                $_SESSION["email"] = $email2;
                $_SESSION["password"] = $password2;
                $_SESSION["gender"] = $gender2;
                $_SESSION["role"] = $role2;
                $_SESSION["imageGuide"] = $image2;
                $_SESSION["about"] = $about2;
                $_SESSION["phone"] = $phone2;
                $_SESSION["dateOfBirth"] =$dateOfBirth2;      
echo "<script>window.location.href = 'guides.php';</script>";
                
            }
           

?>