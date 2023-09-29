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
    <link rel="stylesheet" href="dashboard.css">
    <title>Dashboard</title>
</head>

<body>
    <?php require_once './includes/navbar.php' ?>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <input type="text" placeholder="Search..">
                    <button type="submit"><img src="./assets/images/search.png" alt=""></button>
                </div>
                <div class="user">
                    <!-- <a href="#" class="btn">Add New</a> -->
                    <img src="./assets/images/notifications.png" alt="">
                    <div class="img-case">
                        <img src="./assets/images/user.png" alt="">
                    </div>
                    
                </div>
            </div>
        </div>
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
                        <img src="./assets/images/students.png" alt="">
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
                        <img src="./assets/images/students.png" alt="">
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
                        <img src="./assets/images/students.png" alt="">
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
                        <img src="./assets/images/students.png" alt="">
                    </div>
                </div>
            </div>
            <!-- <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Recent Payments</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>School</th>
                            <th>Amount</th>
                            <th>Option</th>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                    </table>
                </div>
                <div class="new-students">
                    <div class="title">
                        <h2>New Students</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>option</th>
                        </tr>
                        <tr>
                            <td><img src="./assets/images/user.png" alt=""></td>
                            <td>John Steve Doe</td>
                            <td><img src="./assets/images/info.png" alt=""></td>
                        </tr>
                        <tr>
                            <td><img src="./assets/images/user.png" alt=""></td>
                            <td>John Steve Doe</td>
                            <td><img src="./assets/images/info.png" alt=""></td>
                        </tr>
                        <tr>
                            <td><img src="./assets/images/user.png" alt=""></td>
                            <td>John Steve Doe</td>
                            <td><img src="./assets/images/info.png" alt=""></td>
                        </tr>
                        <tr>
                            <td><img src="./assets/images/user.png" alt=""></td>
                            <td>John Steve Doe</td>
                            <td><img src="./assets/images/info.png" alt=""></td>
                        </tr>

                    </table>
                </div>
            </div> -->
        </div>
    </div>
</body>

</html>