<?php
require_once("connection.php");
session_start();
$sql = "SELECT email, primary_phone, secondary_phone FROM content where 1";
            $result = $conn -> query($sql);
            if ($result -> num_rows > 0) {
                while ($row = $result -> fetch_assoc()) {
                    $email = $row['email'];
                    $prime = $row['primary_phone'];
                    $second = $row['secondary_phone'];
                }
                $_SESSION['contactEmail'] = $email;
                $_SESSION['contactPhone'] = $prime;
                $_SESSION['contactEmergency'] = $second;
            }
            if(isset($_POST['submit']) && isset($_POST['email'])&& isset($_POST['phone'])&& isset($_POST['emergency'])) {
                $email = $_POST['email'];
                $prime = $_POST['phone'];
                $second = $_POST['emergency'];
                $sql = "UPDATE `content` SET `email`='$email', `primary_phone`='$prime', `secondary_phone`='$second' WHERE 1";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['contactEmail'] = $email;
                $_SESSION['contactPhone'] = $prime;
                $_SESSION['contactEmergency'] = $second;
                
                echo '<script type="text/javascript">alert("Content Edited!");</script>';

         
echo '<script type="text/javascript">location.href = "contactUs.php";</script>';
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
            }
            ?>