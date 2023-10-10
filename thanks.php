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
        <ul class="nav-ul" id="nav-ul">
            <li><a href="index.php">Home</a></li>
            <li><a href="gallery.html">Gallery</a></li>
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

  <div class="landing">
    <p class="welcome-text">
        Thank you for your purchase and for supporting
         Tebogo's Party Supplies Online Store
      </p>
  </div>
    
  </div>

</body>
<script src="Script/data.js"></script>
<script src="Script/mainScript.js"></script>
<script src="Script/navbar.js"></script>

</html>
