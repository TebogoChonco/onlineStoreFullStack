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
  <title>Handmade by Tebogo</title>
  <link rel="stylesheet" href="Style/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <style>
    .featured-products-container {
      text-align: center;
      /* Center-align the products within the container */
    }

    .featured-product {
      display: inline-block;
      /* Display products horizontally */
      width: calc(33.33% - 20px);
      /* Adjust the width based on your desired layout */
      margin: 10px;
      /* Add spacing between products */
      border: 1px solid #ccc;
      /* Add a border for better separation */
      padding: 10px;
      vertical-align: top;
      /* Align products to the top within their container */
    }
  </style>
</head>

<body>
  <div class="navbar">
    <a class="logo">
      <h2>Tebogo Party Supplies</h2>
    </a>
    <button class="hamburger" id="hamburger">
      <i class="bi bi-list"></i>
    </button>
    <ul class="nav-ul" id="nav-ul">
      <li><a href="aboutUs.php">About</a></li>
      <li><a href="products.php">Products</a></li>
      <li><a href="orders.php">My Orders</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li>
        <a href="cart.html">
          <div class="cart">
            <i class="bi bi-cart-fill"></i>
            <div id="cartAmount" class="cartAmount">0</div>
          </div>
        </a>
      </li>
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
  <div class="featured-products">
    <h2>Featured Products</h2>

    <?php
    $query = "SELECT * FROM products WHERE isFeatured = 1 ORDER BY productID ASC LIMIT 2";
    $result = mysqli_query($conn, $query);
    if (!$result) {
      die("Query failed: " . mysqli_error($conn));
    }
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
    ?>
        <div class="col-md-4" style="width: 500px; flex-direction: column; display: flex; padding-left: 10px; margin-bottom: 10px;">
          <form method="post" action="products.php?action=add&id=<?php echo $row["productID"]; ?>">
            <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
              <img src="./Images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />
              <!-- <img src="./Images/" alt="" srcset=""> -->
              <h4 class="text-info"><?php echo $row["productName"]; ?></h4>

              <h4 class="text-danger">R <?php echo $row["price"]; ?></h4>

              <input type="text" name="quantity" value="1" class="form-control" />

              <input type="hidden" name="hidden_name" value="<?php echo $row["productName"]; ?>" />

              <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

              <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

            </div>
          </form>
        </div>
    <?php
      }
    }
    ?>
  </div>
  <script>
    // JavaScript for incrementing and decrementing the product count
    const productCountElements = document.querySelectorAll('.product-count');

    productCountElements.forEach((countElement, index) => {
      const decrementButton = countElement.querySelector('.decrement');
      const incrementButton = countElement.querySelector('.increment');
      const countNumber = countElement.querySelector('.product-count-number');

      let count = 0;

      decrementButton.addEventListener('click', () => {
        if (count > 0) {
          count--;
          countNumber.textContent = count;
        }
      });

      incrementButton.addEventListener('click', () => {
        count++;
        countNumber.textContent = count;
      });
    });
  </script>
</body>
<!-- <script src="Script/data.js"></script> 
<script src="Script/mainScript.js"></script>
<script src="Script/navbar.js"></script>-->

</html>