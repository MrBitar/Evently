<?php
require_once "connection.php";
if(isset($_GET['eventId']) && isset( $_GET['memberId'])){
$event = $_GET['eventId'];
$member = $_GET['memberId'];
$sql = "UPDATE request SET status='Denied' WHERE member_id = $member AND event_id = $event";
if ($conn->query($sql) === TRUE) {

} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
echo "<script>alert('Member Denied');</script>";
echo '<script type="text/javascript">location.href = "fullMembers.php";</script>';

}

?>