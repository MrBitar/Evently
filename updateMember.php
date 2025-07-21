<?php
require_once "connection.php";
$imgFlag = 0;

session_start();
$memberId = $_SESSION['memberId'];
   if(isset($_POST['submit']) && isset($_POST['email'])  && isset($_POST['name'])
   && isset($_POST['profession']) && isset($_POST['nationality'])  &&  isset($_POST['phone'])
&&  isset($_POST['emergency']) ){
        $email = $_POST['email'];
        $name = $_POST['name'];
        $profession = $_POST['profession'];
        $nationality = $_POST['nationality'];
        $phone = $_POST['phone'];
        $emergency = $_POST['emergency'];
       // echo $email." ". $password." ". $name." ". $profession." ". $joinDate." ". $nationality." ". $phone." ".$emergency." ".$id;
       if(isset($_FILES["photo"])) {
        echo "yes";
        $file = $_FILES["photo"];
        $imgFlag = 0;
        if(empty($file)){
         }else{
            if ($file['error'] == 0) {
                $fileName = $file['name'];
                $fileTmpName = $file['tmp_name'];
                $uploadDir = '../uploads/';
                $filePath = $uploadDir . basename($fileName);
    
            // Move the uploaded file to the server
            if (move_uploaded_file($fileTmpName, $filePath)) {
               $imgFlag = 0;
               $photo = $fileName;
               
            } 
        } else {
            echo "Error uploading file.";
        }
    }
}else{
    $photo = "default.png";
} 
$sql2 = "SELECT * FROM member where `email` = '$email' AND `member_id` != $memberId";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {

        while($row = $result2->fetch_assoc()) {
        }
    echo '<script type="text/javascript">alert("Email Already Exists!");</script>'; 
    echo '<script type="text/javascript">location.href = "profile.php";</script>';
    }
$sql = "UPDATE  `member` SET `email`='$email', `full_name`='$name', 
                   `mobile_number`='$phone', `emergency_number`='$emergency', `profession`='$profession'
                   , `nationality`='$nationality', `photo` = '$photo' WHERE `member_id` = '$memberId'";
          if ($conn->query($sql) === TRUE) {
          
          } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
          }
       
} 
echo '<script type="text/javascript">alert("Profile Updated!");</script>'; 
echo '<script type="text/javascript">location.href = "profile.php";</script>';

?>