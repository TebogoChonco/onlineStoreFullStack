<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
  <div class="side-menu">
    <div class="brand-name">
      <h3>Handmade by Tebogo</h3>
    </div>
    <ul>
    <li><a href="dashboard.php"><img src="./assets/images/dashboard (2).png" alt="">&nbsp; <span>Dashboard</span></a></li>
    <li><a href="products.php"><img src="./assets/images/reading-book (1).png" alt="">&nbsp;<span>Products</span></a></li>
    <li><a href="brands.php"><img src="./assets/images/teacher2.png" alt="">&nbsp;<span>Brands</span></a></li>
    <li><a href="orders.php"><img src="./assets/images/school.png" alt="">&nbsp;<span>Orders</span></a></li>
    <li><a href="payments.php"><img src="./assets/images/payment.png" alt="">&nbsp;<span>Payments</span></a></li>
    <li><a href="users.php"><img src="./assets/images/users.png" width="35px"  alt="">&nbsp; <span>Users</span></a></li>
    <li><a href="settings.php"><img src="./assets/images/settings.png" alt="">&nbsp;<span>Settings</span></a></li>
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