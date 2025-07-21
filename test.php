<input type='file' id='$banner' name='$banner' accept='image/png, image/gif, image/jpeg'  class='btn btn-primary ' title='Upload new banner' />
<button onclick='changeBanner(this)' id='$bannerId' value='$banner' class='btn btn-success'>Change</button>
                        
<?php
$pass = 12345678;
$pass= password_hash($pass, PASSWORD_DEFAULT);
echo $pass;
?>