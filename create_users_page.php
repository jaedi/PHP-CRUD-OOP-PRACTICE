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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="style.css">
</head>
<body>



<div class="container">
    <div class="heading">
        <h1>All Users</h1>
        <a href="index.php" class="back-button"><i class="fas fa-arrow-left"></i>&nbsp; Back</a>
    </div>

    <div class="form-card">
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
</div>
    

</body>
</html>