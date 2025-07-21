<?php
require_once "connection.php";
//session_start();
$flag=0;
$email="";

   if(isset($_POST['submit']) && isset($_POST['adminEmail']) && isset($_POST['adminPassword'])){
        $email = $_POST['adminEmail'];
        $password = $_POST['adminPassword'];
           
$sql2 = "SELECT `password`,`user_id` FROM user where `email` = '$email'";
$result2 = $conn -> query($sql2);
if ($result2 -> num_rows > 0) {

    while ($row = $result2 -> fetch_assoc()) {
        $hash = $row['password'];
        if(password_verify($password,$hash)){
            $flag =1;
            $id = $row['user_id'];
        }
    }
}else{
echo '<script>alert("Wrong Email")</script>';

    
}
if ($flag == 1) {
    
$_SESSION["invalid"]= "";
$_SESSION["wrongEmail"]= "Enter Your Email";
$_SESSION["wrongPassword"]= "Enter Your Password";
    $sql = "DELETE FROM `user` WHERE user_id = $id";
if ($conn->query($sql) === TRUE) {

} else {
echo "Error: " . $sql . "<br>" . $conn->error;
} 
$sql = "DELETE FROM `guide_managment` WHERE user_id = $id";
if ($conn->query($sql) === TRUE) {

} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
  
}else{
   
   echo '<script>alert("Wrong Password")</script>';
}          

echo '<script type="text/javascript">alert("Guide Deleted!");</script>';

echo '<script type="text/javascript">location.href = "deleteGuide.php";</script>';

}else{
    

}


?>