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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
    <div class="heading">
    <h1>All Users</h1>
    <a href="create_users_page.php" class="add-user-button"><i class="fas fa-user-plus"></i> Add User</a>
    </div>
    
    </div>
    <table class="custom-table">
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
                <td class="table-action">
                    <a href="update_users_page.php?user=<?php echo $user['id']; ?>" class="text-green"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href="index.php?user=<?php echo $user['id']; ?>&action=delete" class="text-red" onclick="return confirm('Are you sure you want to delete this user?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

</body>
</html>