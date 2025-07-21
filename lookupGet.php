
<?php 
function getLookupCode(){
    include "connection.php";

    $sql2 = "SELECT `code` FROM lookups_managment GROUP BY `code`";
    $result2 = $conn-> query($sql2);
    if ($result2 -> num_rows > 0) {
        while ($row2 = $result2 -> fetch_assoc()) {
            $code= $row2["code"];
            
                    echo "<option  value='$code' id='$code'> Code: $code</option>";
        }
    }

}


?>