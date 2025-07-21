<?php
require_once "connection.php";
if(isset($_GET['eventId']) && isset( $_GET['memberId'])){
$event = $_GET['eventId'];
$member = $_GET['memberId'];
$sql = "UPDATE request SET status='Approved' WHERE member_id = $member AND event_id = $event";
if ($conn->query($sql) === TRUE) {

} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "INSERT INTO `event_member`(`event_id`, `member_id`) 
VALUES ('$event','$member')";
if ($conn->query($sql) === TRUE) {
    
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
echo "<script>alert('Member Approved');</script>";
echo '<script type="text/javascript">location.href = "fullMembers.php";</script>';

}

?>