<?php

session_start();
require_once './config/database.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

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
            <h3>Tebogo Party Supplies</h3>
        </a>
        <button class="hamburger" id="hamburger">
            <i class="bi bi-list"></i>
        </button>
        <ul class="nav-ul" id="nav-ul">
            <li><a href="index.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="contactUs.php">Contact Us</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li>
                <?php
               if (isset($_SESSION['user_username'])) {
                 echo '<li><a href="account.php">My Account</a></li>';
                 echo '<li><a href="logout.php">Log Out</a></li>';
                 } else {
                  echo '<li><a href="login.php">Log In</a></li>';
                  echo '<li><a href="register.php">Register</a></li>';
                 }
            ?>
        </ul>
    </div>

    <div class="welcome">
        <p class="welcome-text">
            Welcome to Tebogo's Party Supplies Online Store
        </p>
        </ul>
    </div>

</body>

<?php
echo "...page to be added"
?>