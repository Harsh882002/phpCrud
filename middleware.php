<!-- it restrict to access the file from addree bar -->

<?php
if(isset($_SESSION['is_user_loggedin'])){
    return true;
}else{
    header("LOCATION: admin.php");
}
?>