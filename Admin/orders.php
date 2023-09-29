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
    <div>
        <?php require_once './includes/navbar.php' ?>
    </div>
    <br>
    <div class="container">
        <div class="header">
        </div>
        <div class="content">
            <div class="cards">
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
                <!-- <div class="card">
                        <div class="box">
                            <h1>
                                <?php
                                // Define the time frame for recently added products (e.g., last 7 days)
                                $recentDays = 7;

                                // Calculate the date that represents the start of the recent period
                                $startDate = date('Y-m-d H:i:s', strtotime("-$recentDays days"));

                                // SQL query to count recently added products
                                $sql = "SELECT COUNT(*) AS count_recent_products FROM products WHERE dateCreated >= ?";

                                // Prepare the SQL statement
                                $stmt = $conn->prepare($sql);

                                if ($stmt === false) {
                                    die("Prepare failed: " . $conn->error);
                                }

                                // Bind the parameter to the SQL statement
                                $stmt->bind_param("s", $startDate);

                                // Execute the SQL statement
                                $stmt->execute();

                                // Bind the result to a variable
                                $stmt->bind_result($countRecentProducts);

                                // Fetch the result
                                $stmt->fetch();
                                $stmt->close();

                                // Output the count of recently added products
                                echo $countRecentProducts;
                                ?>
                            </h1>
                            <h3>New Products</h3>
                        </div>
                        <div class="icon-case">
                            <img src="./assets/images/teachers.png" alt="">
                        </div>
                    </div> -->
                <!-- <div class="card">
                        <div class="box">
                            <h1>
                                <?php
                                $sql = "SELECT COUNT(*) AS count_oldest_products FROM products ORDER BY dateCreated ASC LIMIT 1";

                                // Execute the SQL statement
                                $result = $conn->query($sql);

                                if ($result === false) {
                                    die("Query failed: " . $conn->error);
                                }

                                // Fetch the result
                                $row = $result->fetch_assoc();
                                $countOldestProducts = $row['count_oldest_products'];
                                echo $countOldestProducts;
                                ?>
                            </h1>
                            <h3>Old Products</h3>
                        </div>
                        <div class="icon-case">
                            <img src="./assets/images/schools.png" alt="">
                        </div>
                    </div> -->
                <!-- <div class="card">
                        <div class="box">
                            <h1>
                                <?php
                                // SQL query to calculate the sum of prices
                                $sql = "SELECT SUM(price) AS total_amount FROM products";

                                // Execute the query
                                $result = $conn->query($sql);

                                if ($result) {
                                    // Fetch the result as an associative array
                                    $row = $result->fetch_assoc();

                                    // Total amount

                                    $totalAmount = $row["total_amount"];
                                    $roundedTotalAmount = number_format($totalAmount, 2);

                                    // Display the total amount
                                    echo $roundedTotalAmount;
                                    // Close the database connection
                                    // $conn->close();
                                } else {
                                    echo "Error executing the query: " . $conn->error;
                                }
                                ?>
                            </h1>
                            <h3>Price Total</h3>
                        </div>
                        <div class="icon-case">
                            <img src="./assets/images/income.png" alt="">
                        </div>
                    </div> -->
            </div>

            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>All Products</h2>
                        <li><a href="viewProducts.php"><button class="btn" id="viewBtn">View All</button></a></li>
                        <li><a href="addProducts.php"><button class="btn" id="addBtn">Add Products</button></a></li>

                    </div>
                    <table>
                        <tr>
                            <th>Order Number</th>
                            <th>Customer Name</th>
                            <!-- <th>Price</th> -->
                            <th>Option</th>
                        </tr>

                        <?php
                        // SQL query to select the first 5 products with productName, price, and stockQuantity
                        $sql = "SELECT
                            o.orderNumber AS OrderNumber,
                            u.fullname AS CustomerName,
                            u.email AS CustomerEmail
                        FROM
                            orders o
                        INNER JOIN
                            users u ON o.userID = u.id
                         LIMIT 5";

                        $result = mysqli_query($conn, $sql);

                        if (!$result) {
                            die("Query failed: " . mysqli_error($conn));
                        }

                        // Check if there are results
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row["OrderNumber"] ?></td>
                                    <td><?php echo $row["CustomerName"] ?></td>
                                    <!-- <td><?php echo "R" . $row["price"] ?></td> -->

                                    <td><a href="#" class="btn">View</a></td>
                                </tr>
                        <?php   }
                        } else {
                            echo "No products found.";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>