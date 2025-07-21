<?php 
session_start();
require_once "connection.php";
$sql2 = "SELECT * FROM banners WHERE `section` = 'home'";
$result2 = $conn -> query($sql2);
if ($result2 -> num_rows > 0) {
    while ($row = $result2 -> fetch_assoc()) {
        $homeBanner = $row["banner"];
       
    }
}
$sql2 = "SELECT * FROM banners WHERE `section` = 'general_info1'";
$result2 = $conn -> query($sql2);
if ($result2 -> num_rows > 0) {
    while ($row = $result2 -> fetch_assoc()) {
        $generalInfoBanner1 = $row["banner"];
       
    }
}
$sql2 = "SELECT * FROM banners WHERE `section` = 'general_info2'";
$result2 = $conn -> query($sql2);
if ($result2 -> num_rows > 0) {
    while ($row = $result2 -> fetch_assoc()) {
        $generalInfoBanner2 = $row["banner"];
       
    }
}
$sql2 = "SELECT * FROM banners WHERE `section` = 'about_us'";
$result2 = $conn -> query($sql2);
if ($result2 -> num_rows > 0) {
    while ($row = $result2 -> fetch_assoc()) {
        $aboutUsBanner = $row["banner"];
       
    }
}

$sql2 = "SELECT * FROM content ";
$result2 = $conn -> query($sql2);
if ($result2 -> num_rows > 0) {
    while ($row = $result2 -> fetch_assoc()) {
        $generalInfo1 = $row["general_info1"];
        $generalInfo2 = $row["general_info2"];
        $generalInfo3 = $row["general_info3"];
        $about = $row['about_us'];
        $happy = $row['happy_clients'];
        $numOfEvents = $row['num_of_events'];
        $phone1 = $row['primary_phone'];
        $phone2 = $row['secondary_phone'];
        $email = $row['email'];
       
    }
}


?>