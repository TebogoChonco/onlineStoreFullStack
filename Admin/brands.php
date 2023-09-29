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
                                $sql = "SELECT COUNT(*) AS brand_count FROM brands";

                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // Fetch the result as an associative array
                                    $row = $result->fetch_assoc();
                                    $productCount = $row["brand_count"];
                                    echo $productCount;
                                } else {
                                    echo "No products found.";
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

                <div class="content-2">
                    <div class="recent-payments">
                        <div class="title">
                            <h2>All Brands</h2>
                            <li><a href="viewProducts.php"><button class="btn" id="viewBtn">View All</button></a></li>
                            <li><a href="addProducts.php"><button class="btn" id="addBtn">Add Brands</button></a></li>

                        </div>
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Origin</th> 
                                <th>Options</th> 
                            </tr>

                            <?php
                            // SQL query to select the first 5 products with productName, price, and stockQuantity
                            $sql = "SELECT * FROM brands LIMIT 5";

                            // Execute the query
                            $result = $conn->query($sql);

                            // Check if there are results
                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $row["brandName"] ?></td>
                                        <td><?php echo $row["brandOrigin"] ?></td>
                                
                                        <td><a href="#" class="btn">Edit</a>
                                        <a href="#" class="btn">View</a></td>
                                    </tr>
                            <?php   }
                            } else {
                                echo "No Brands found.";
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
    </body>

    </html>