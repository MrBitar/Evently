<?php
require_once "connection.php";
//session_start();
    
   
function getViewEvents(){
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

?>