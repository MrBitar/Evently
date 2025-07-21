<?php

require_once "connection.php";
if (!isset($_SESSION["memberImage"])) {
    $_SESSION["memberImage"] = "default.png";
}
if (!isset($_SESSION["memberName"])) {
    $_SESSION["memberName"] = "";
}
if (!isset($_SESSION["memberEmail"])) {
    $_SESSION["memberEmail"] = "";
}
if (!isset($_SESSION["memberPassword"])) {
    $_SESSION["memberPassword"] = "";
}
if (!isset($_SESSION["profession"])) {
    $_SESSION["profession"] = "";
}
if (!isset($_SESSION["nationality"])) {
    $_SESSION["nationality"] = "";
}
if (!isset($_SESSION["JoinDate"])) {
    $_SESSION["JoinDate"] = "";
}
if (!isset($_SESSION["memberPhone"])) {
    $_SESSION["memberPhone"] = "";
}
if (!isset($_SESSION["emergency"])) {
    $_SESSION["emergency"] = "";
}



function getMembers() {

    include "connection.php";

    $sql2 = "SELECT `member_id`, `full_name` FROM member";
    $result2 = $conn -> query($sql2);
    if ($result2 -> num_rows > 0) {
        while ($row2 = $result2 -> fetch_assoc()) {
            $name = $row2['full_name'];
            $member_id = $row2["member_id"];

            echo "<option  value='$member_id' id='$member_id'>#$member_id, Name: $name</option>";


        }
    }

}

if (isset($_GET["memberId"])) {
    $member_id = $_GET['memberId'];
    require_once "connection.php";
    session_start();

    $sql = "SELECT * FROM `member` where `member_id` = '$member_id'";


    $result = $conn -> query($sql);
    if ($result -> num_rows > 0) {
        while ($row = $result -> fetch_assoc()) {


            $name = $row["full_name"];
            $email = $row["email"];
            $joinDate = $row["joining_date"];
            $phone = $row["mobile_number"];
            $emergency = $row['emergency_number'];
            $profession = $row['profession'];
            $nationality = $row['nationality'];
            $photo = $row['photo'];
            $pass = $row['password'];
        }

    }
     $_SESSION["memberToEditId"] = $member_id;
    $_SESSION["memberImage"] = $photo;
    $_SESSION["memberName"] = $name;
    $_SESSION["memberEmail"] = $email;
    $_SESSION["memberPassword"] = $pass;
    $_SESSION["profession"] = $profession;
    $_SESSION["nationality"] = $nationality;
    $_SESSION["JoinDate"] = $joinDate;
    $_SESSION["memberPhone"] = $phone;
    $_SESSION["emergency"] = $emergency;
    

  

//echo $member_id." ".$photo." ".$name." ".$email." ".$pass." ".$profession." ".$nationality." ".$joinDate." ".$phone." ".$emergency;
   echo "<script>window.location.href = 'members.php';</script>";
   
} else {
    
}



?>