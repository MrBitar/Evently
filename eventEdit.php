<?php
require_once "connection.php";
session_start();
if(isset($_SESSION["eventToEditId"])){
$id = $_SESSION["eventToEditId"];
}
$photo = 'defaultEvent.jpg';
if(!isset($_SESSION["editPhotoEvent"])){
     $_SESSION["editPhotoEvent"]=$photo;
    }

   if(isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['dest']) && isset($_POST['category'])
   && isset($_POST['description']) && isset($_POST['dateTo']) 
&& isset($_POST['dateFrom']) && isset($_POST['cost']) && isset($_POST['status'])){
        $dest = $_POST['dest'];
        $category = $_POST['category'];
        $event = $_POST['name'];
        $desc = $_POST['description'];
        $dateTo = $_POST['dateTo'];
        $dateFrom = $_POST['dateFrom'];
        $cost = $_POST['cost'];
        $status = $_POST['status'];
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
                   $sql = "UPDATE `event_managment` SET `photo` = '$photo',`name`='$event',`description`='$desc',
        `category`='$category',`destination`='$dest',`date_from`='$dateFrom',
        `date_to`='$dateTo',`cost`='$cost',`status`='$status' WHERE event_id = $id";

if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("Event Edited!");</script>';
    
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
                } 
            } else {
                echo "Error uploading file.";
            }
        }
    }else{
        $sql = "UPDATE `event_managment` SET `name`='$event',`description`='$desc',
        `category`='$category',`destination`='$dest',`date_from`='$dateFrom',
        `date_to`='$dateTo',`cost`='$cost',`status`='$status' WHERE event_id = $id";

if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("Event Edited!");</script>';
    
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}


    }
        
                $_SESSION["editPhotoEvent"] =$photo;
                $_SESSION["editEvent"] = $event;
                $_SESSION["editDest"] = $dest;
                $_SESSION["editDateFrom"] = $dateFrom;
                $_SESSION["editDateTo"] = $dateTo;
                $_SESSION["editCost"] = $cost;
                $_SESSION["editDesc"] = $desc;

                
echo '<script type="text/javascript">location.href = "editEvent.php";</script>';

}
?>

