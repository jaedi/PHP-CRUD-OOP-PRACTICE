<?php

//Import Users Object
include 'users.php';

$users = new Users();

// Delete record
if(isset($_GET['user']) && $_GET['action'] === "delete" && !empty($_GET['user'])) {
    $users->delete($_GET['user']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page | PHP Create Read Update Delete Practice - OOP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
    <h1 class="heading">
    All Users
    <a href="create_users_page.php" class="add-user-button">Add User</a>
    </h1>
    </div>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $users = $users->index();
            foreach ($users as $user) {
        ?>
            <tr>
                <td> <?php echo $user['id']; ?> </td>
                <td> <?php echo $user['name']; ?> </td>
                <td> <?php echo $user['email']; ?> </td>
                <td> <?php echo $user['username']; ?> </td>
                <td>
                    <a href="update_users_page.php?user=<?php echo $user['id']; ?>" class="text-green">Update</a>
                    <a href="index.php?user=<?php echo $user['id']; ?>&action=delete" class="text-red" id="btnDelete" onclick="confirm('Are you sure you want to delete this user?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</body>
</html>