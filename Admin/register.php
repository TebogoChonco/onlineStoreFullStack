<?php session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handmade by Tebogo</title>
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
        <div class="py-5" id="register">

            <h1>Registration Form</h1>

            <form action="register-process.php" method="POST">

                <div class="inner_conntainer">
                    <input type="text" placeholder="Enter Username" name="username" autocomplete="on" required>
                    <input type="text" placeholder="Enter Full name" name="fullname" autocomplete="on" required>
                    <input type="email" placeholder="Enter email" name="email" autocomplete="off" required>
                    <input type="number" placeholder="Enter phone number" name="phone" autocomplete="off" required>
                    <input type="password" placeholder="Enter Password" name="password" required>
                    <input type="password" placeholder="Confirm Password" name="cpassword" required>
                    <br>
                    <button class="login_button" name="register_btn" type="submit">Register</button>
                    <a href="./login.php"><button type="button" class="back_btn">Log in</button></a>
                </div>
            </form>
        </div>
    </div>
</body>