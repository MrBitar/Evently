<?php
require_once "connection.php";
   
$photo = "defaultEvent.jpg";
if(!isset($_SESSION['imageEvent'])){
    $_SESSION['imageEvent'] ="defaultEvent.jpg";
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
                   
                } 
            } else {
                echo "Error uploading file.";
            }
        }
    }
        $sql = "INSERT INTO `event_managment`( `name`, `description`,`photo`, `category`, `destination`, `date_from`, `date_to`, `cost`, `status`) 
        VALUES ('$event','$desc','$photo','$category','$dest', '$dateTo', '$dateFrom',$cost,'$status')";
if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("Event Added!");</script>';
    
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}


$_SESSION['imageEvent'] =$photo;

$_SESSION["event"] = $name;
$_SESSION["dest"] = $email;
$_SESSION["dateFrom"] = $passDB;
$_SESSION["dateTo"] = $gender;
$_SESSION["cost"] = $role;
$_SESSION["desc"] = $desc;

                
echo '<script type="text/javascript">location.href = "events.php";</script>';

}else{
$_SESSION['imageEvent'] ='defaultEvent.jpg';

    $_SESSION["event"] = 
    $_SESSION["dest"] = 
    $_SESSION["dateFrom"] = 
    $_SESSION["dateTo"] = 
    $_SESSION["cost"] = 
    $_SESSION["desc"] = "";
                
}

?>