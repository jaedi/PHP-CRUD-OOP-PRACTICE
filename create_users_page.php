<?php 

include 'users.php';

$users = new Users();

if(isset($_POST['submit'])) {
    $users->create($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Users Page | PHP Create Read Update Delete Practice - OOP</title>
</head>
<body>

<div>
    <h2>Create Users</h2>
</div>

<div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" placeholder="Please enter name..." required>
        </div>
        <div>
            <label for="email">Email address:</label>
            <input type="email" name="email" placeholder="Please enter valid email address..." required>
        </div>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" placeholder="Please prefered username..." required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Please enter password..." required>
        </div>
        <div>
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>
</div>
    

</body>
</html>