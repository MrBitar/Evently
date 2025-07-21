
<?php 
session_start();

 unset($_SESSION["memberId"]);
unset($_SESSION["memberPhoto"]);
 unset($_SESSION["memberName"]);

header("Location: index.php");
?>