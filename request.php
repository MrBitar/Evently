<?php
require_once("connection.php");
session_start();
if (isset($_SESSION["memberId"])) {
    $member = $_SESSION["memberId"];
}
if (isset($_SESSION["event_id"])) {
    $event = $_SESSION["event_id"];
}else{
echo '<script type="text/javascript">alert("Something Went Wrong!");</script>';
}
$sql = "INSERT INTO `request`( `event_id`, `member_id`, `status`) VALUES ('$event','$member','Pending')";
if ($conn->query($sql) === TRUE) {
echo '<script type="text/javascript">alert("Request Sent!");</script>';
echo "<script type='text/javascript'>window.location.href ='event.php?eventId=$event';</script>";

} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
?>