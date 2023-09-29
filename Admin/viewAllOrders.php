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
    <br>
    <div class="container">
        <div class="header">
        </div>
        <div class="content"> 

            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>All Orders</h2>
                        <!-- <li><a href="viewProducts.php"><button class="btn" id="viewBtn">View All</button></a></li> -->
                        <li><a href="orders.php"><button class="btn" id="addBtn">BACK</button></a></li>

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
                            users u ON o.userID = u.id";

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