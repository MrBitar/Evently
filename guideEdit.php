<?php
require_once "connection.php";
session_start();
if(isset($_SESSION["guideToEditId"])){
    $id = $_SESSION["guideToEditId"];
}
   if(isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name'])
   && isset($_POST['role']) && isset($_POST['phone']) && isset($_POST['gender']) &&  isset($_POST['dateofbirth'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passDB = password_hash($password, PASSWORD_DEFAULT);
        $name = $_POST['name'];
        $role = $_POST['role'];
        $dateOfBirth = $_POST['dateofbirth'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $about = $_POST['about'];
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
                   
                   $sql = "UPDATE `guide_managment` SET `photo`='$fileName',`about`='$about',`phone`='$phone' WHERE `user_id`='$id'";
                    if ($conn->query($sql) === TRUE) {
                    } else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
                } else {
                    $imgFlag =1;
                    $sql = "UPDATE `guide_managment` SET `about`='$about',`phone`='$phone' WHERE `user_id`='$id'";
if ($conn->query($sql) === TRUE) {
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
                }
            } else {
                echo "Error uploading file.";
            }
        }
    }
    $sql = "UPDATE `user` SET `name`='$name',`email`='$email',`password`='$passDB',`dateOfBirth`='$dateOfBirth'
    ,`gender`='$gender',`role`='$role' WHERE `user_id`='$id'";
if ($conn->query($sql) === TRUE) { 
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$_SESSION["guideToEditId"] = $_SESSION["name"] = $_SESSION["email"] = 
                $_SESSION["password"] = 
                $_SESSION["gender"] = 
                $_SESSION["role"] = "";
                $_SESSION["imageGuide"] = "default.png";
                $_SESSION["about"] = 
                $_SESSION["phone"] = 
                $_SESSION["dateOfBirth"] = "";
                
                echo '<script type="text/javascript">alert("Guide Edited!");</script>';

         
echo '<script type="text/javascript">location.href = "guides.php";</script>';

}

function imageResize($imageSrc,$imageWidth,$imageHeight) {

    $newImageWidth =300;
    $newImageHeight =300;

     $newImageLayer=imagecreatetruecolor($newImageWidth,$newImageHeight);



   imagecopyresampled($newImageLayer,$imageSrc,0,0,0,0,$newImageWidth,$newImageHeight,$imageWidth,$imageHeight);

    return $newImageLayer;
}
?>