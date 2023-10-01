<?php
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
            <li><a href="gallery.html">Gallery</a></li>
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

    <div class="contact" id="contact">

        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3590.4845912267024!2d28.193307274497883!3d-25.853523677294316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e95642f94556637%3A0x871943ee85276f9f!2sCorporate%2066%20Office%20Park%2C%20269%20Von%20Willich%20Ave%2C%20Die%20Hoewes%2C%20Centurion%2C%200157!5e0!3m2!1sen!2sza!4v1683220706280!5m2!1sen!2sza"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <br>
    <hr>

    <div class="adress">
        <div class="left">
            <p>
                <i class="bi bi-telephone-fill"></i>
                012 345 6677
            </p>
            <br>
            <p>
                <i class="bi bi-geo-alt-fill"></i>
                269 Von Willich Ave,Die Hoewes, Centurion, 0157
            </p>
            <br>
            <p>
                <i class="bi bi-envelope-fill"></i>
                info@handmade.co.za
            </p>
        </div>
        <div class="right">
            <h2>Contact Us</h2>
            <p>
                If you have any queries, please complete the following form
                and click on the SUBMIT button to email it for our attention.
            </p>

            <form>
                <div class="name">
                    <label for="yourName" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="field" required>
                </div>
                <div class="email">
                    <label for="email" class="form-label">Your Email</label>
                    <input type="email" class="form-control" id="field" placeholder="example@gmail.com" required>
                </div>
                <div class="message">
                    <label for="message" class="form-label" id="message">Message</label>
                    <textarea class="form-control" id="message" required></textarea>
                </div>

                <button data-modal-target="#modal" class="btn">Send Mail</button>
                <div class="modal" id="modal">
                    <div class="modal-header">
                        <div class="title">Mail sent</div>
                        <button data-close-button class="close-button">&times;</button>
                    </div>

                    <div class="modal-body">
                        <i class="bi bi-send-check-fill"></i>

                        <p>Your message has been sent and a member of our team will respond to you very soon.</p>
                    </div>
                </div>
                <div id="overlay"></div>
        </div>
        </form>
    </div>

    <script src="Script/navbar.js"></script>
    <script src="Script/cart.js"></script>
    <script src="Script/modal.js"></script>
</body>

</html>