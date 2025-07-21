<?php
require_once "connection.php";

   if(isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $emailFlag = 0;
        
        $sql2 = "SELECT * FROM member where `email` = '$email'";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {

        while($row = $result2->fetch_assoc()) {
            $email = $row["email"];
                $hash =$row["password"];
                $member_id = $row['member_id'];
                $name = $row['full_name'];
                $photo = $row['photo'];
            if(password_verify($password,$hash)){
                $_SESSION['memberId']= $member_id;
                $_SESSION['memberPhoto']= $photo;
                $_SESSION['memberName']= $name;
                
                echo "<script>alert('Log In Succesfull!');</script>";
                echo "<script>window.location.href = 'index.php';</script>";
            }else{
                echo "<script>document.getElementById('email').classList.add('is-valid');</script>";
                echo "<script>document.getElementById('email').value = '$email';</script>";
                echo "<script>document.getElementById('password').classList.add('is-invalid');</script>";
                echo "<script>document.getElementById('password').value = '$password';</script>";
                echo '<script>document.getElementById("invalid-password").textContent = "Wrong Password!";</script>';
        
            }
            }
            
        }          
        else{
            $_SESSION['memberId']= "";

            echo "<script>document.getElementById('email').classList.add('is-invalid');</script>";
        echo "<script>document.getElementById('email').value = '$email';</script>";
        echo '<script>document.getElementById("invalid-email").textContent = "Email Doesn\'t Exist";</script>';
        
        }
    }
?>