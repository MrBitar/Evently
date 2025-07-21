<?php
require_once "connection.php";
$imgFlag = 0;
$photo = "default.png";
if(!isset($_SESSION["memberNameR"])){
    $_SESSION["memberNameR"]="";
}
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
        $sql2 = "SELECT * FROM member where `email` = '$email'";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {

        while($row = $result2->fetch_assoc()) {
        }
        
        $_SESSION["memberNameR"] = $name;
        $_SESSION["memberEmail"] = $email;
        $_SESSION["memberPassword"] = $password;
        $_SESSION["profession"] = $profession;
        $_SESSION["nationality"] = $nationality;
        $_SESSION["JoinDate"] = $joinDate;
        $_SESSION["memberPhone"] = $phone;
        $_SESSION["emergency"] = $emergency;
        echo '<script type="text/javascript">alert("Email Already Exists!");</script>'; 
echo '<script type="text/javascript">location.href = "register.php";</script>';
    }
       // echo $email." ". $password." ". $name." ". $profession." ". $joinDate." ". $nationality." ". $phone." ".$emergency." ".$id;
        if(isset($_FILES['myImage'])) {
            $file = $_FILES['myImage'];
            
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
                $imgFlag = 1; 
                echo "Error uploading file.";
            }
        }
    }
    $_SESSION["memberImage"] = $photo;
    if($imgFlag == 1){
        $sql = "INSERT INTO `member`  (`email`, `full_name`, `joining_date`, `mobile_number`, `emergency_number`, `profession`, `nationality`, `password`) 
         VALUES ('$email',
        '$name','$joinDate','$phone','$emergency','$profession','$nationality','$passDB')";
    if ($conn->query($sql) === TRUE) {
     
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
}else{
    $sql = "INSERT INTO `member`  (`email`, `full_name`, `joining_date`,`photo`, `mobile_number`, `emergency_number`, `profession`, `nationality`, `password`) VALUES ('$email',
        '$name','$joinDate','$photo','$phone','$emergency','$profession','$nationality','$passDB')";
if ($conn->query($sql) === TRUE) {

} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}}

$_SESSION["memberImage"] = "default.png";
$_SESSION["memberToEditId"] = 
$_SESSION["memberNameR"] = 
$_SESSION["memberEmail"] = 
$_SESSION["memberPassword"] = 
$_SESSION["profession"] = 
$_SESSION["nationality"] = 
$_SESSION["JoinDate"] = 
$_SESSION["memberPhone"] =
$_SESSION["emergency"] = "";
$sql2 = "SELECT * FROM member where `email` = '$email'";
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {

while($row = $result2->fetch_assoc()) {
    $member_id = $row['member_id'];
}}
$_SESSION["memberId"]= $member_id;
$_SESSION["memberPhoto"]= $photo;
$_SESSION["memberName"]= $name;
                echo '<script type="text/javascript">alert("Registration Succesfull!");</script>'; 
echo '<script type="text/javascript">location.href = "index.php";</script>';
}
?>