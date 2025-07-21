<?php
require_once "connection.php";
$flag=0;
$email="";

   if(isset($_POST['submit']) && isset($_POST['memberEmail']) && isset($_POST['memberPassword'])){
        $email = $_POST['memberEmail'];
        $password = $_POST['memberPassword'];
           
$sql2 = "SELECT `password`,`member_id` FROM member where `email` = '$email'";
$result2 = $conn -> query($sql2);
if ($result2 -> num_rows > 0) {

    while ($row = $result2 -> fetch_assoc()) {
        $hash = $row['password'];
        if(password_verify($password,$hash)){
            $flag =1;
            $id = $row['member_id'];
        }
    }
}else{
    $_SESSION['memberEmailDel'] = $email;
echo '<script>alert("Wrong Email")</script>';
back();
    
}
if ($flag == 1) {
    
$_SESSION["invalid"]= "";
$_SESSION["wrongEmail"]= "Enter Your Email";
$_SESSION["wrongPassword"]= "Enter Your Password";
    $sql = "DELETE FROM `member` WHERE member_id = $id";
if ($conn->query($sql) === TRUE) {

} else {
echo "Error: " . $sql . "<br>" . $conn->error;
} 
$sql = "DELETE FROM `request` WHERE member_id = $id";
if ($conn->query($sql) === TRUE) {

} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "DELETE FROM `event_member` WHERE member_id = $id";
if ($conn->query($sql) === TRUE) {

} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
  
}else{
   echo '<script>alert("Wrong Password")</script>';
back();

}          

echo '<script type="text/javascript">alert("Member Deleted!");</script>';
back();


}else{
    $_SESSION['memberEmailDel'] = "";

}
function back(){
    echo '<script type="text/javascript">location.href = "deleteMember.php";</script>';

}

?>