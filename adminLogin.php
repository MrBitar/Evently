<?php
require_once "connection.php";
   if(isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $emailFlag = 0;
        $sql = "SELECT user_id FROM admin";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $user_id=   $row["user_id"];  
 
        $sql2 = "SELECT * FROM user where user_id = $user_id";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {

        while($row = $result2->fetch_assoc()) {

            if($row["email"] == $email){
                $emailFlag = 1;
                $hash =$row["password"];
            if(password_verify($password,$hash)){
                $_SESSION['user_id']= $user_id;
                $_SESSION['allUser']= $user_id;
               
                echo "<script>window.location.href = 'home.php';</script>";

                

            }else{
                echo "<script>document.getElementById('email').classList.add('is-valid');</script>";
                echo "<script>document.getElementById('email').value = '$email';</script>";
                echo "<script>document.getElementById('password').classList.add('is-invalid');</script>";
                echo "<script>document.getElementById('password').value = '$password';</script>";
                echo '<script>document.getElementById("invalid-password").textContent = "Wrong Password!";</script>';
        
            }
            }
            
        }          
        
           
        }
    }
}else{
        echo'No Admins Found!';
    }
if($emailFlag == 0){
        echo "<script>document.getElementById('email').classList.add('is-invalid');</script>";
        echo "<script>document.getElementById('email').value = '$email';</script>";
        echo '<script>document.getElementById("invalid-email").textContent = "Email Doesn\'t Exist";</script>';
        
     }  
}

?>