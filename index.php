<?php

session_start();
require_once './config/database.php';
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
        <button class="hamburger" id="hamburger">
            <i class="bi bi-list"></i>
        </button>
        <ul class="nav-ul" id="nav-ul">
            <li><a href="index.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="contactUs.php">Contact Us</a></li>
            <li><a href="gallery.php">Gallery</a></li>
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

    <div class="welcome">
        <p class="welcome-text">
            Welcome to Tebogo's Party Supplies Online Store
        </p>
    </div>

    <h2>Featured Products</h2><br>
    <div class="featured-products-index">       
        <?php
              $query = "SELECT * FROM products WHERE isFeatured = 1 ORDER BY productID ASC LIMIT 5";
                $result = mysqli_query($conn, $query);
                if (!$result) {
               die("Query failed: " . mysqli_error($conn));
                 }
              if (mysqli_num_rows($result) > 0) {
           while ($row = mysqli_fetch_array($result)) {
         ?>

        <div class="products">
            <form method="post" action="products.php?action=add&id=<?php echo $row["productID"]; ?>">
                <div class="display">
                    <img src="./Images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />

                    <h3 class="text-info"><?php echo $row["productName"]; ?></h3>

                    <h4 class="text-danger">R <?php echo $row["price"]; ?></h4>

                    <input type="hidden" name="hidden_name" value="<?php echo $row["productName"]; ?>" />

                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

                    <button type="submit" name="add_to_cart">View more</button>
                </div>
            </form>
        </div>
        <?php
             } };
        ?>
    </div>
</body>

</html>