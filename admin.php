<?php
include("database.php");

if (isset($_POST['submit'])) {
    extract($_POST);

    #sql query to login
    $sql = "SELECT * FROM admindata where username = '$username' AND password = '$password'";
    $result = $connect->query($sql);

    if ($result->num_rows) {

        $_SESSION['is_user_loggedin'] = true;
        $_SESSION['user_data'] = mysqli_fetch_assoc(($result));
        header("LOCATION: add_user.php");
    } else {
        echo '<script>alert("username or password something went rong");</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="style1.css">

<body>
   
    <center>
        <h2 class="ad">ADMIN LOGIN</h2>

        <form action="admin.php" method="post">
            <div id="mid">
                <input type="text" placeholder="Enter your username " name="username" required>

                <br><br><br>

                <input type="text" placeholder="Enter your password " name="password" required>
                <br><br><br>
            </div>
            <input type="submit" name="submit">

        </form>
    </center>
</body>

</html>