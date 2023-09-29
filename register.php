<?php session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handmade by Tebogo</title>
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
      <li><a href="aboutUs.php">About</a></li>
      <li><a href="products.php">Products</a></li>
      <li><a href="orders.php">My Orders</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li>
        <a href="cart.html">
          <div class="cart">
            <i class="bi bi-cart-fill"></i>
            <div id="cartAmount" class="cartAmount">0</div>
          </div>
        </a>
      </li>
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
        <div class="py-5" id="register">

            <h3>Registration Form</h3>

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