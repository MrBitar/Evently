<?php
require_once "connection.php";
$photo = "default.png";
   if(isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name'])
   && isset($_POST['role']) && isset($_POST['phone']) && isset($_POST['gender'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passDB = password_hash($password, PASSWORD_DEFAULT);
        $name = $_POST['name'];
        $role = $_POST['role'];
        $dateOfBirth = $_POST['date'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $about = $_POST['about'];
        $emailFlag = 0;
        $sql = "SELECT * FROM user where 1";
$result = $conn -> query($sql);
if ($result -> num_rows > 0) {
    while ($row = $result -> fetch_assoc()) {
        if($email == $row['email']){
            $emailFlag = 1;
        }
    }
}
if($emailFlag == 0) {
        $sql = "INSERT INTO `user` (`name` , `email` , `password` , `dateOfBirth` , `gender`, `role`) VALUES
         ( '$name', '$email', '$passDB', '$dateOfBirth' , '$gender' , '$role')";
if ($conn->query($sql) === TRUE) {
    
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "SELECT user_id, dateOfBirth FROM user where `email` = '$email'";
$result = $conn -> query($sql);
if ($result -> num_rows > 0) {
    while ($row = $result -> fetch_assoc()) {
        $id = $row['user_id'];
        echo $row['dateOfBirth'];
    }
}

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
           $photo = $file['name'];
           
        } else {
            $imgFlag =1;

        }
    } else {
         echo "Error uploading file."; 
    }
}
}else {

  
}
$sql = "INSERT INTO `guide_managment` (`photo`,`about`,`phone`,`user_id`) VALUES ('$photo','$about','$phone',$id)";
            if ($conn->query($sql) === TRUE) {
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
                }
}
else{
    echo "<script>document.getElementById('email').classList.add('is-valid');</script>";
    echo '<script>document.getElementById("invalid-email").textContent = "Email Already Exists!";</script>';
}
$_SESSION["newName"] = $name;
$_SESSION["newEmail"] = $email;
$_SESSION["newPassword"] = $passDB;
$_SESSION["newGender"] = $gender;
$_SESSION["newRole"] = $role;
$_SESSION["newImage"] = $photo;
$_SESSION["newAbout"] = $about;
$_SESSION["newPhone"] = $phone;
$_SESSION["newDateOfBirth"] = $dateOfBirth;
echo '<script type="text/javascript">alert("Guide Added!");</script>';


                
echo '<script type="text/javascript">location.href = "addGuides.php";</script>';

}else{
    $_SESSION["newName"] = $_SESSION["newEmail"] = 
                $_SESSION["newPassword"] = 
                $_SESSION["newGender"] = 
                $_SESSION["newRole"] = "";
                $_SESSION["newImage"] = $photo;
                $_SESSION["newAbout"] = 
                $_SESSION["newPhone"] = 
                $_SESSION["newDateOfBirth"] = ""; 
                $_SESSION['message']="";
                
}

?>