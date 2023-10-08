<?php session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store Full Stack</title>
    <link rel="stylesheet" href="Style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>

<body>
    <div class="navbar">
        <a class="logo">
            <h2>Tebogo Party Supplies</h2> 
        </a>
        <button class="hamburger" id="hamburger">
            <i class="bi bi-list"></i>
        </button>
        <ul class="nav-ul" id="nav-ul">
            <li><a href="index.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="contactUs.html">Contact Us</a></li>
            <li><a href="gallery.html">Gallery</a></li>
        </ul>

    </div>

    <div class="welcome">
        <div class="py-5" id="register"> 

            <h3>Login Form</h3>

            <form action="login-process.php" method="POST">

                <div class="inner_conntainer">
                    <input type="email" placeholder="Enter email" name="email" autocomplete="off" required>
                    <input type="password" placeholder="Enter Password" name="password" required>
                    <br>
                    <button class="login_button" name="login_btn" type="submit">Login</button>
                    <a href="./register.php"><button type="button" class="back_btn">Register</button></a>
                </div>
            </form>
        </div>
    </div>
</body>