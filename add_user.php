<?php
include("create/database.php");

if (isset($_POST['submit'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';


    $date = date("Y-m-d H:i:s");
    $sql = "INSERT INTO users (name, age, city, creat_time) VALUES ('$name', '$age', '$city', '$date')";


    $result = $connect->query($sql);

    if ($result) {
        echo '<script>alert("user added successfully");</script>';
    } else {
        echo "Error: " . $connect->error;
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
        <div id="user">
            <h2>User Add</h2>

            <form action="add_user.php" method="POST">
                <input type="text" name="name" placeholder="Enter your name ">
                <br><br><br>
                <input type="text" name="age" placeholder="Enter your age ">
                <br><br><br>

                <input type="text" name="city" placeholder="Enter your city">

                <br><br><br>
                <button type="submit" name="submit">ADD</button>
            </form>
        </div>
        <!-- <input type="submit" name="submit"> -->

    </center>
    <a href="users.php" class="al"> All Users </a>
</body>

</html>