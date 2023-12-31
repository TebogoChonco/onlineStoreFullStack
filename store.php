<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once 'database.php';

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
            <h2>Party Supplies Store</h2>
        </a>
        <button class="hamburger" id="hamburger">
            <i class="bi bi-list"></i>
        </button>
        <ul class="nav-ul" id="nav-ul">
            <li>
                <a href="index.html">
                    <p>Welcome</p>
                </a>
            </li>
            <li>
                <a href="register.php">
                    <p>Register</p>
                </a>
            </li>
            <li>
                <a href="store.html">
                    <p>Home</p>
                </a>
            </li>
            <li>
                <a href="aboutUs.html">
                    <p>About Us</p>
                </a>
            </li>
            <li>
                <a href="gallery.html">
                    <p>Gallery</p>
                </a>
            </li>
            <li>
                <a href="contactUs.html">
                    <p>Contact Us</p>
                </a>
            </li>
            <li>
                <a href="cart.html">
                    <div class="cart">
                        <i class="bi bi-cart-fill"></i>
                        <div id="cartAmount" class="cartAmount">0</div>
                    </div>
                </a>
            </li>
    </div>

    <div class="welcome">
        <p class="welcome-text">
            Welcome to Tebogo's Party Supplies Online Store
        </p>
        <ul></ul>
    </div>

    <div class="shop" id="shop">

    </div>

</body>
<script src="Script/data.js"></script>
<script src="Script/mainScript.js"></script>
<script src="Script/navbar.js"></script>

</html>