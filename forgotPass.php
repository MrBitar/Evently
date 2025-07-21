<?php
require_once "connection.php";


session_start();

   if(isset($_POST['submit']) && isset($_POST['forgotEmail']) && isset($_POST['forgotPassword'])){
        $email = $_POST['forgotEmail'];
        $password = $_POST['forgotPassword'];
        $passDB = password_hash($password, PASSWORD_DEFAULT);
$sql = "UPDATE  `member` SET  `password` = '$passDB' WHERE `email` = '$email'";
          if ($conn->query($sql) === TRUE) {
          
          } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
          }
       echo '<script type="text/javascript">alert("Password Updated!");</script>'; 
echo '<script type="text/javascript">location.href = "login.php";</script>';

} 

?>