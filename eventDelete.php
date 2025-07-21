<?php
require_once "connection.php";
//session_start();


   if(isset($_POST['submit']) && isset($_POST['id']) && isset($_POST['name'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
 

        $sql2 = "SELECT `event_id`, `name` FROM event_managment Where event_id = $id";
        $result2 = $conn-> query($sql2);
        if ($result2 -> num_rows > 0) {
            while ($row2 = $result2 -> fetch_assoc()) {
                $name2 = $row2['name'];
                $event_id= $row2["event_id"];

            }
            $sql = "DELETE FROM `event_managment` WHERE event_id = $id";
            if ($conn->query($sql) === TRUE) {
    
                
            } else{
            
            }
            $sql = "DELETE FROM `request` WHERE event_id = $id";
            if ($conn->query($sql) === TRUE) {
    
                
            } else{
            
            }$sql = "DELETE FROM `event_member` WHERE event_id = $id ";
            if ($conn->query($sql) === TRUE) {
    
                
            } else{
            
            }$sql = "UPDATE `guide_managment` SET `event_id`= 0 WHERE event_id = $id";
            if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("Event Deleted!");</script>';
                
            } else{
            
            }
    } else{
        $_SESSION['eventDelName'] = $name2;
        $_SESSION['eventDelID'] = $event_id;
    echo '<script type="text/javascript">alert("Something went Wrong please try again");</script>';

    
    }
   

echo '<script type="text/javascript">location.href = "deleteEvent.php";</script>';

} else{

    $_SESSION['eventDelName'] = 
$_SESSION['eventDelID'] = "";
}      





?>