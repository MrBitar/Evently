<?php
include("connection.php");
$sql = "SELECT general_info1,general_info2,general_info3 FROM content where 1";
            $result = $conn -> query($sql);
            if ($result -> num_rows > 0) {
                while ($row = $result -> fetch_assoc()) {
                    $general1 = $row['general_info1'];
                    $general2 = $row['general_info2'];
                    $general3 = $row['general_info3'];
                }
                $_SESSION['generalInfo'] = $general1;
                $_SESSION['generalInfo2'] = $general2;
                $_SESSION['generalInfo3'] = $general3;
            }
            if(isset($_POST['submit']) && isset($_POST['general']) && isset($_POST['general2']) && isset($_POST['general3'])) {
                $general1 = $_POST['general'];
                $general2 = $_POST['general2'];
                $general3 = $_POST['general3'];
                $sql = "UPDATE `content` SET `general_info1`='$general1',`general_info2`='$general2',`general_info3`='$general3' WHERE 1";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['generalInfo'] = $general1;
                $_SESSION['generalInfo2'] = $general2;
                $_SESSION['generalInfo3'] = $general3;
                
                echo '<script type="text/javascript">alert("Content Edited!");</script>';

         
echo '<script type="text/javascript">location.href = "generalInfo.php";</script>';
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
            }
            ?>