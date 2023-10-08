<?php
session_start();
require_once '../config/database.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="products.css">
    <title>Dashboard</title>
</head>

<body>
    <?php require_once './includes/navbar.php' ?>
    <div class="container">
        <div class="header">
            <div class="nav">

                <div class="header" id="dashboard-header">
                    <h2>Welcome to your Admin Dashboard</h2>
                    <!-- <div class="img-case">
                        <img src="./assets/images/profile.png" width="50px">
                    </div> -->
                </div>
                <div class="user">
                    <!-- <a href="#" class="btn">Add New</a> -->
                    <!-- <img src="./assets/images/notifications.png" alt=""> -->
                </div>
            </div>
        </div>
        <?php

if (isset($_SESSION['user_username'])) {
  echo '<li><a href="account.php">My Account</a></li>';
  echo '<li><a href="logout.php">Log Out</a></li>';
} else {
  echo '<li><a href="login.php">Log In</a></li>';
  echo '<li><a href="register.php">Register</a></li>';
}
?>
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>
                            <?php
                            $sql = "SELECT COUNT(*) AS product_count FROM products";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Fetch the result as an associative array
                                $row = $result->fetch_assoc();
                                $productCount = $row["product_count"];
                                echo $productCount;
                            } else {
                                echo "No products found.";
                            }
                            ?>
                        </h1>
                        <h3>Total Products</h3>
                    </div>
                    <div class="icon-case">
                        <img src="./assets/images/reading-book (1).png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>
                            <?php
                            $sql = "SELECT COUNT(*) AS order_count FROM orders";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Fetch the result as an associative array
                                $row = $result->fetch_assoc();
                                $productCount = $row["order_count"];
                                echo $productCount;
                            } else {
                                echo "No products found.";
                            }
                            ?>
                        </h1>
                        <h3>Total Orders</h3>
                    </div>
                    <div class="icon-case">
                        <img src="./assets/images/school.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>
                            <?php
                            $sql = "SELECT COUNT(*) AS user_count FROM users";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Fetch the result as an associative array
                                $row = $result->fetch_assoc();
                                $productCount = $row["user_count"];
                                echo $productCount;
                            } else {
                                echo "No products found.";
                            }
                            ?>
                        </h1>
                        <h3>Total Users</h3>
                    </div>
                    <div class="icon-case">
                        <img src="./assets/images/users.png" width="35px" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>
                            <?php
                            $sql = "SELECT COUNT(*) AS brand_count FROM brands";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Fetch the result as an associative array
                                $row = $result->fetch_assoc();
                                $productCount = $row["brand_count"];
                                echo $productCount;
                            } else {
                                echo "No brand found.";
                            }
                            ?>
                        </h1>
                        <h3>Total Brands</h3>
                    </div>
                    <div class="icon-case">
                        <img src="./assets/images/teacher2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>