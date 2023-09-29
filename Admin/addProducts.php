<?php
// Include the database connection script if not already included
require_once '../config/database.php';

if (isset($_POST['submit'])) {
    $productName = $_POST['name'];
    $productDescription = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $categoryID = $_POST['categoryID'];
    $brandID = $_POST['brandID'];
    $isFeatured = $_POST['isFeatured'];
    $isAvailable = $_POST['isAvailable'];

    // Check if the file was uploaded without errors
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $targetDir = "C:/xampp/htdocs/eCommerceStore2/Images/"; // Corrected file path
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file type is valid
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        if (in_array($imageFileType, $allowedExtensions)) {
            // Move the uploaded image to the target directory
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                // Insert data into the database
                $sql = "INSERT INTO products (productName, productDescription, stockQuantity, price, categoryID, brandID, image, isFeatured, isAvailable) 
                    VALUES ('$productName', '$productDescription', $quantity, '$price', $categoryID, $brandID, '$targetFile', $isFeatured, $isAvailable)";

                if ($conn->query($sql) === TRUE) {
                    echo "Product inserted successfully!";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Sorry, there was an error moving the uploaded file.";
            }
        } else {
            echo "Invalid file type. Allowed types: jpg, jpeg, png, gif";
        }
    } else {
        echo "Error uploading the file. Error code: " . $_FILES["image"]["error"];
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <style>
        .form-group {
            display: flex;
            align-items: center;
        }

        /* CSS for adjusting label and input sizes */
        label {
            flex: 1;
            text-align: right;
            margin-right: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            flex: 2;
            width: 50%;
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a class="logo">
            <h2>Tebogo Party Supplies</h2>
        </a>
    </div>

    <div class="welcome">
        <div class="py-5" id="register">

            <h3>Add Products Form</h3>

            <form action="addProducts.php" method="POST" enctype="multipart/form-data">
                <div class="inner_conntainer">
                    <label for="name">Name:</label>
                    <input type="text" id="name" placeholder="Enter Product Name" name="name" autocomplete="on" required><br>
                    <label for="description">Description:</label>
                    <textarea id="description" placeholder="Enter Product Description" name="description"></textarea><br>
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" placeholder="Enter Product Quantity" name="quantity" autocomplete="off" required><br>
                    <label for="price">Price:</label>
                    <input type="text" id="price" placeholder="Enter Product Price" name="price" autocomplete="off" required><br>

                    <label for="categoryID">Category:</label>
                    <select id="categoryID" name="categoryID" required>
                        <!-- Populate this dropdown dynamically from the category table in your database -->
                        <option value="">Select Category</option>
                        <?php
                        $categoryQuery = "SELECT * FROM categories";
                        $categoryResult = $conn->query($categoryQuery);
                        while ($row = $categoryResult->fetch_assoc()) {
                            echo '<option value="' . $row['ID'] . '">' . $row['category'] . '</option>';
                        }
                        ?>
                    </select><br><br>

                    <label for="brandID">Brand:</label>
                    <select id="brandID" name="brandID" required>
                        <!-- Populate this dropdown dynamically from the brand table in your database -->
                        <option value="">Select Brand</option>
                        <?php
                        $brandQuery = "SELECT * FROM brands";
                        $brandResult = $conn->query($brandQuery);
                        while ($row = $brandResult->fetch_assoc()) {
                            echo '<option value="' . $row['ID'] . '">' . $row['brandName'] . '</option>';
                        }
                        ?>
                    </select><br>

                    <label for="image">Product Image:</label>
                    <input type="file" id="image" name="image" accept="image/*" required style="width: 180px;"><br>

                    <label for="isFeatured">Is Featured:</label>
                    <select id="isFeatured" name="isFeatured" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select><br><br>

                    <label for="isAvailable">Is Available:</label>
                    <select id="isAvailable" name="isAvailable" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select><br>
                    <br>
                    <button class="login_button" name="submit" type="submit">Add Product</button>
                    <a href="products.php"><button type="button" class="back_btn">Back</button></a>
                </div>
            </form>
        </div>
    </div>
</body>