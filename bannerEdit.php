<?php
//session_start();
if(isset($_POST['bannerId'])){ 
require_once "connection.php";

$id = $_POST['bannerId'];

$file = $_FILES["$id"];
$imgFlag=0;
$photo = "";
    if(empty($file)){
     }else{
        if ($file['error'] == 0) {
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $uploadDir = '../banners/';
            $filePath = $uploadDir . basename($fileName);
        // Move the uploaded file to the server
        if (move_uploaded_file($fileTmpName, $filePath)) {
           $imgFlag = 0;
           $photo = $file['name'];
           
        } else {
            $imgFlag =1;

        }
    } else {
         echo "Error uploading file."; 
    }
}
if($imgFlag == 0){
$sql = "UPDATE `banners` SET `banner`= '$photo' WHERE `id`=$id";
            if ($conn->query($sql) === TRUE) {
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
                }
                echo "<script>alert('Banner Updated!');</script>";
echo "<script>window.location.href = 'banner.php';</script>";
            }
        }else{
            echo "WTF";
        }
        

?>