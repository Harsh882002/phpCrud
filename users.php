<?php
include("database.php");

include("middleware.php");

//delete query
if (isset($_GET['id'])) {
    extract($_GET);
    $id = $_GET['id'];
     $sql = "delete from users where id = " . $id;
    $result = $connect->query($sql);
    if ($result)
    echo '<script>alert("User deleted successfully");</script>';
    else
        echo '<script>alert("something went wrong try again!");</script>';
}



//get data query
$sql = "SELECT *  from users";
$result = $connect->query($sql);
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

<a href="add_user.php" class="add">ADD DATA</a>
<h2>User Data</h2>

    <table class="tb">

        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>age</th>
                <th>city</th>
                <th>create_time</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            if ($result->num_rows > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['age'] ?></td>
                        <td><?php echo $row['city'] ?></td>
                        <td><?php echo $row['creat_time'] ?></td>

                        <td><a href="edit.php?id=<?php echo $row['id'] ?>" class="edit">Edit</a>
                            <a href="users.php?id=<?php echo $row['id'] ?>" class="delete">Delete</a>
                        </td>
                    </tr>

            <?php
                }
            } else {
                echo "not found data";
            }
            ?>

<a href="admin.php" id="lo"> Log out </a>

        </tbody>
    </table>
</body>

</html>