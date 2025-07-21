<?php
include("connection.php");
$sql = "SELECT * FROM content where 1";
            $result = $conn -> query($sql);
            if ($result -> num_rows > 0) {
                while ($row = $result -> fetch_assoc()) {
                    $about = $row['about_us'];
                    $happy = $row['happy_clients'];
                    $numOfEvents = $row['num_of_events'];
                }
                $_SESSION['aboutUs'] = $about;
                $_SESSION['happy'] = $happy;
                $_SESSION['numOfEvents'] = $numOfEvents;
            }
            if(isset($_POST['submit']) && isset($_POST['about']) && isset($_POST['happy']) && isset($_POST['numOfEvents'])) {
                $about = $_POST['about'];
                $happy = $_POST['happy'];
                $numOfEvents = $_POST['numOfEvents'];
                $sql = "UPDATE `content` SET `about_us`='$about', `happy_clients`='$happy',`num_of_events`='$numOfEvents' WHERE 1";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['aboutUs'] = $about;
                
                echo '<script type="text/javascript">alert("Content Edited!");</script>';

         
echo '<script type="text/javascript">location.href = "content.php";</script>';
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
            }
            ?>