<?php
require_once "connection.php";
session_start();
if(isset($_SESSION["memberToEditId"])){
    $id = $_SESSION["memberToEditId"];
    }

$photo = "default.png";
   if(isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name'])
   && isset($_POST['profession']) && isset($_POST['nationality']) && isset($_POST['joinDate']) &&  isset($_POST['phone'])
&&  isset($_POST['emergency']) ){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passDB = password_hash($password, PASSWORD_DEFAULT);
        $name = $_POST['name'];
        $profession = $_POST['profession'];
        $joinDate = $_POST['joinDate'];
        $nationality = $_POST['nationality'];
        $phone = $_POST['phone'];
        $emergency = $_POST['emergency'];
       // echo $email." ". $password." ". $name." ". $profession." ". $joinDate." ". $nationality." ". $phone." ".$emergency." ".$id;
        if(isset($_FILES['myImage'])) {
            $file = $_FILES['myImage'];
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
                  
                } else {
                    $imgFlag =1; 
                    
                }
            } else {
                $imgFlag =1; 
                echo "Error uploading file.";
            }
        }
    }
    if($imgFlag == 1){
        $sql = "UPDATE `member` SET `email`='$email',
        `full_name`='$name',
        `mobile_number`='$phone',`emergency_number`='$emergency',
        `profession`='$profession',`nationality`='$nationality',`password`='$passDB' WHERE  `member_id`='$id'";
    if ($conn->query($sql) === TRUE) {
    
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
}else{
    $sql = "UPDATE `member` SET `email`='$email',
    `full_name`='$name',`joining_date`='$joinDate',
    `mobile_number`='$phone',`emergency_number`='$emergency',`photo`='$photo',
    `profession`='$profession',`nationality`='$nationality',`password`='$passDB' WHERE  `member_id`='$id'";
if ($conn->query($sql) === TRUE) {

} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}}
$_SESSION["memberImage"] = "default.png";
$_SESSION["memberToEditId"] = 

$_SESSION["memberName"] = 
$_SESSION["memberEmail"] = 
$_SESSION["memberPassword"] = 
$_SESSION["profession"] = 
$_SESSION["nationality"] = 
$_SESSION["JoinDate"] = 
$_SESSION["memberPhone"] =
$_SESSION["emergency"] = "";
                echo '<script type="text/javascript">alert("Member Edited!");</script>'; 
echo '<script type="text/javascript">location.href = "members.php";</script>';
}

?>