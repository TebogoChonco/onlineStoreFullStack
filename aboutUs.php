<?php

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
                <a href="cart.html">
                    <div class="cart">
                        <i class="bi bi-cart-fill">Cart</i>
                        <div id="cartAmount" class="cartAmount">0</div>
                    </div>
                </a>
            </li>
            <li><a href="orders.php">My Orders</a></li>
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

    <div class="card-wrapper">
        <div class="card-heading">
            <p>
                ABOUT US
            </p>
        </div>
        <div class="card-container">
            <div class="card">
                <div class="ard-title">
                    <h3 class="card-title" id="heading">
                        ABOUT US
                    </h3>
                    <br>
                </div>
                <br>
                <div class="card-body">
                    <p>
                        We're a small printing shop that was established in 2018 by my husband and I.
                        We have since added a few more members to the team as the business is growing.
                        We are highly regarded for our professionalism, service and integrity,
                        but even more so for understanding our customers and delivering what they need,
                        when they need it. Our team have a proven track record of
                        designing, printing and delivering everything from clothing material
                        and personalised gifts, to wedding stationery to exhibition graphics,
                        signage, and posters.
                    </p>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-title">
                    <p class="card-title" id="heading">
                        VISION & MISSION
                    </p>
                </div>
                <br>
                <div class="card-body">
                    <h3 class="card-title">VISION</h3>
                    To become an innovative leader in the integrated marketing and media industry!
                    <br>
                    <h3 class="card-title">MISSION</h3>
                    To provide affordable services and products yet not compromising on the best service
                    in the field, providing you, our important customer with high quality products.
                </div>
            </div>
        </div>
    </div>

</body>
<!-- <script src="Script/data.js"></script> -->
<script src="Script/mainScript.js"></script>
<script src="Script/navbar.js"></script>

</html>