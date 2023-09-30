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
        <div class="container">
            <div class="header">
            </div>
            <div class="content"> 

                <div class="content-2">
                    <div class="recent-payments">
                        <div class="title">
                            <h2>All Products</h2>
                            <!-- <li><a href="viewProducts.php"><button class="btn" id="viewBtn">View All</button></a></li> -->
                            <li><a href="products.php"><button class="btn" id="addBtn">Back</button></a></li>

                        </div>
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Images</th>
                            </tr>

                            <?php
                            // SQL query to select the first 5 products with productName, price, and stockQuantity
                            $sql = "SELECT products.productName, categories.category, brands.brandName, products.stockQuantity, products.price, products.image
                            FROM products
                            INNER JOIN categories ON products.categoryID = categories.ID
                            INNER JOIN brands ON products.brandID = brands.ID";

                            // Execute the query
                            $result = $conn->query($sql);

                            // Check if there are results
                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $row["productName"] ?></td>
                                        <td><?php echo $row["stockQuantity"] ?></td>
                                        <td><?php echo "R" . $row["price"] ?></td> 
                                        <td><?php echo $row["category"] ?></td>
                                        <td><?php echo $row["brandName"] ?></td>
                                        <td><img src="../Images/" class="product-image" data-src="<?php $row["image"]; ?>" width="50" height="50"></td>
                                        <td><a href="#" onclick="showImage('<?php echo $row['image']; ?>')"></a></td>
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

        <!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function showImage(imagePath) {
        // Display the image in a new window or modal
        window.open('Images/' + imagePath, '_blank');
    }
</script>

    </body>

    </html>