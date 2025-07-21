<?php
require_once "connection.php";
//session_start();


   if(isset($_POST['submit']) && isset($_POST['event'])){
        $event_id = $_POST['event'];
        
 

        
            $sql = "
            UPDATE `event_managment` SET `status`='Active' WHERE event_id = $event_id";
           
            if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("Event Published!");</script>';
                
            } else{
            
            }
  
    
    
   

echo '<script type="text/javascript">location.href = "publish.php";</script>';

} 




?>