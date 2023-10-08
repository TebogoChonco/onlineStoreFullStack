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
    <ul class="nav-ul" id="nav-ul">
      <?php

      if (isset($_SESSION['username'])) {
        echo '<li><a href="account.php">My Account</a></li>';
        echo '<li><a href="logout.php">Log Out</a></li>';
      } else {
        echo '<li><a href="login.php">Log In</a></li>';
        echo '<li><a href="register.php">Register</a></li>';
      }
      ?>
    </ul>
  </div>

    <!-- <div class="welcome">
        <div class="py-5" id="register">

            <h3>Login Form</h3>

            <form action="login-process.php" method="POST">

                <div class="inner_conntainer"> 
                <input type="text" placeholder="Enter Username" name="username" autocomplete="on" required> 
                    <input type="password" placeholder="Enter Password" name="password" required> 
                    <br>
                    <button class="login_button" name="login_btn" type="submit">Login</button>
                    <a href="./register.php"><button type="button" class="back_btn">Register</button></a>
                </div>
            </form>
        </div>
    </div> -->
</body>