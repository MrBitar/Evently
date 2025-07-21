<?php
require_once "connection.php";
session_start();

   if(isset($_POST['submit']) && isset($_POST['lookupNameDel']) && isset($_POST['lookupCodeDel'])){ 

    $name = $_POST['lookupNameDel'];
    $code = $_POST['lookupCodeDel'];

 
    $sql = "DELETE FROM  `lookups_managment` WHERE `code`='$code' AND `name`='$name'";
if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("Lookup Deleted!");</script>';
} else {
echo "Error: " . $sql . "<br>" . $conn->error;

}  
echo '<script type="text/javascript">location.href = "deleteLookup.php";</script>';

}else{
    echo 'wtf';
}

  
?>