<?php
include("database.php");
include("middleware.php");


// Fetch user details if ID is provided in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $connect->query($sql);

    if ($result) {
        $user = mysqli_fetch_assoc($result);
    } else {
        $error = "Error fetching user: " . $connect->error;
    }
}

// Handle form submission to edit user
if (isset($_POST['submit'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';

    // Update user in database
    $sql = "UPDATE users SET name = '$name', age = '$age', city = '$city' WHERE id = $id";
    $result = $connect->query($sql);

    if ($result) {
        echo '<script>alert("User Updated Successfully!");</script>';
    } else {
        echo '<script>alert("Something went wrong!");</script>';
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
        <div id="ed">
            <h3>Edit User</h3>
            <form action="edit.php?id=<?php echo $user['id'] ?>" method="POST">
                <input type="text" name="name" placeholder="Enter your name " value="<?php echo $user['name'] ?>" required>
                <br><br><br>
                <input type="text" name="age" placeholder="Enter your age " value="<?php echo $user['age'] ?>" required>
                <br><br><br>

                <input type="text" name="city" placeholder="Enter your city" value="<?php echo $user['city'] ?>" required>

                <br><br><br>
                <button type="submit" name="submit">Edit</button>
            </form>
        </div>
    </center>

    <a href="users.php">All User</a>
</body>

</html>