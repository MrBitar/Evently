<?php
require_once "connection.php";
session_start();
if (!isset($_SESSION["lookupName"]) ){
    $_SESSION["lookupName"]="";
}if (!isset($_SESSION["lookupOrder"]) ){
    $_SESSION["lookupOrder"]="";
}if (!isset($_SESSION["lookupCode"]) ){
    $_SESSION["lookupCode"]="";
}
   if(isset($_POST['submit']) && isset($_POST['lookUpName']) && isset($_POST['lookupOrder']) && isset($_POST['lookupCode'])){
        
        $name = $_POST['lookUpName'];
        $order = $_POST['lookupOrder'];
        $code = $_POST['lookupCode'];
        $sql = "SELECT * FROM `lookups_managment` where `name`= '$name' AND `code`='$code'";
$result = $conn -> query($sql);
if ($result -> num_rows > 0) {
    while ($row = $result -> fetch_assoc()) {        
        }
        $_SESSION['lookupName'] = $name;
        $_SESSION['lookupOrder'] = $order;
        $_SESSION['lookupCode'] = $code;

        echo '<script type="text/javascript">alert("Name Already Exists For This Code!");</script>';


    }else{
        $sql = "INSERT INTO `lookups_managment`( `code`, `name`, `lookup_order`) 
        VALUES ('$code','$name','$order')";
if ($conn->query($sql) === TRUE) {
    $_SESSION['lookupName'] = 
    $_SESSION['lookupOrder'] = 
    $_SESSION['lookupCode'] = '';
        echo '<script type="text/javascript">alert("Lookup Added!");</script>';
} else {
echo "Error: " . $sql . "<br>" . $conn->error;

}
    }
    
        echo '<script type="text/javascript">location.href = "lookup.php";</script>';
}
?>