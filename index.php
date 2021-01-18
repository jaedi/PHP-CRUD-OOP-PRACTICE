<?php

//Import Users Object
include 'users.php';

$users = new Users();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page | PHP Create Read Update Delete Practice - OOP</title>
</head>
<body>
    <h1>
    All Users
    <a href="create_users_page.php" style="float:right;">Add User</a>
    </h1>

    <table style="width:100%; border: 1px solid black;" border="1">
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
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align:center;">
                <a href="update.php?user=" style="color:green;">Update</a>
                <a href="delete.php?user=" style="color:red;">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>