<?php session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store Full Stack</title>
    <link rel="stylesheet" href="products.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>

<body>
    <div class="navbar">
        <a class="logo">
            <h1>Tebogo Party Supplies Admin Dashboard</h1>
        </a>
        <br>
        <br>
    </div>
    <div class="welcome">
     <div class="py-5" id="register"><br>
            <h1>Login Form</h1>

            <form action="login-process.php" method="POST">

                <div class="inner_conntainer">
                    <input type="text" placeholder="Enter username" name="username" autocomplete="off" required>
                    <input type="password" placeholder="Enter Password" name="password" required>
                    <br>
                    <button class="login_button" name="login_btn" type="submit">Login</button>
                    <a href="./register.php"><button type="button" class="back_btn">Register</button></a><br><br>
                    <a href="../login.php"><button type="button" class="login_btn">Login as User</button></a>
                </div>
            </form>
        </div>
    </div>
</body>