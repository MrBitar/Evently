<?php
require_once "connection.php";
session_start();

   if(isset($_POST['submit']) && isset($_POST['lookupEditCode']) 
   && isset($_POST['lookUpNameEdit']) && isset($_POST['lookupOrderEdit'])
&& isset($_POST['lookupIdEdit'])){ 
    $name = $_POST['lookUpNameEdit'];
    $order = $_POST['lookupOrderEdit'];
    $code = $_POST['lookupEditCode'];
    $id = $_POST['lookupIdEdit'];
    $sql = "SELECT * FROM `lookups_managment` where `name`= '$name' AND `code`='$code'";
$result = $conn -> query($sql);
if ($result -> num_rows > 0) {
while ($row = $result -> fetch_assoc()) {        
    }
    $sql = "UPDATE  `lookups_managment` SET `lookup_order`='$order' WHERE `lookup_id`='$id'";
    if ($conn->query($sql) === TRUE) {
        echo '<script type="text/javascript">alert("Lookup Edited!");</script>';
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    
    }
    
}else{
    $sql = "UPDATE  `lookups_managment` SET `code`='$code', `name`='$name', `lookup_order`='$order' WHERE `lookup_id`='$id'";
if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("Lookup Edited!");</script>';
} else {
echo "Error: " . $sql . "<br>" . $conn->error;

}
}

    echo '<script type="text/javascript">location.href = "editLookup.php";</script>';
}else{
    echo"what habben";
}


?>