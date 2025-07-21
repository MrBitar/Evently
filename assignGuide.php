<?php
require_once "connection.php";
//session_start();


   if(isset($_POST['submit']) && isset($_POST['event']) && isset($_POST['guide'])){
        $event_id = $_POST['event'];
        $guide_id = $_POST['guide'];
 

        
            $sql = "
            UPDATE `guide_managment` SET `event_id`='$event_id' WHERE user_id = $guide_id";
           
            if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("Guide Assigned!");</script>';
                
            } else{
            
            }
  
    
    
   

echo '<script type="text/javascript">location.href = "assign.php";</script>';

} 




?>