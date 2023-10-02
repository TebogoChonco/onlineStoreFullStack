<?php
session_start();
require_once './config/database.php';


if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'            =>    $_GET["id"],
                'item_name'            =>    $_POST["hidden_name"],
                'item_price'        =>    $_POST["hidden_price"],
                'item_quantity'        =>    $_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {
            echo '<script>alert("Item Already Added")</script>';
        }
    } else {
        $item_array = array(
            'item_id'            =>    $_GET["id"],
            'item_name'            =>    $_POST["hidden_name"],
            'item_price'        =>    $_POST["hidden_price"],
            'item_quantity'        =>    $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="products.php"</script>';
            }
        }
    }
}

if (isset($_POST["checkout"])) {
    // Check if the user is logged in before proceeding to checkout
    if (!isset($_SESSION['user_username'])) {
        header("Location: login.php");
        exit();
    }
    // Perform the checkout process here
    // You can display the selected items and process the payment on this page
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>W</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="Style/style.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
                <a href="cart.php">
                    <div class="cart">
                        <i class="bi bi-cart-fill">Cart</i>
                        <div id="cartAmount" class="cartAmount">0</div>
                    </div>
                </a>
            </li>
            <li><a href="orders.php">My Orders</a></li>
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
        </ul>
    </div>
    <div class="order-container">
        <!-- <div class="featured-products">
            <h2>Featured Products</h2>

            <?php
              $query = "SELECT * FROM products WHERE isFeatured = 1 ORDER BY productID ASC ";
                $result = mysqli_query($conn, $query);
                if (!$result) {
               die("Query failed: " . mysqli_error($conn));
                 }
              if (mysqli_num_rows($result) > 0) {
           while ($row = mysqli_fetch_array($result)) {
         ?>
            <div class="col-md-4">

                <form method="post" action="products.php?action=add&id=<?php echo $row["productID"]; ?>">
                    <div class="display">
                        <img src="./Images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />

                        <h3 class="text-info"><?php echo $row["productName"]; ?></h3>

                        <h4 class="text-danger">R <?php echo $row["price"]; ?></h4>

                        <input type="number" name="quantity" value="1" class="form-control" />

                        <input type="hidden" name="hidden_name" value="<?php echo $row["productName"]; ?>" />

                        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

                        <input type="submit" name="add_to_cart" />

                    </div>
                </form>
            </div>
        </div> -->
        <?php
            }
        }
        ?>
        <div style="clear:both">
            <br />
            <h2>Order Details</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th width="40%">Item Name</th>
                        <th width="10%">Quantity</th>
                        <th width="20%">Price</th>
                        <th width="15%">Total</th>
                        <th width="5%">Action</th>
                    </tr>
                    <?php
                if (!empty($_SESSION["shopping_cart"])) {
                    $total = 0;
                    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                ?>
                    <tr>
                        <td><?php echo $values["item_name"]; ?></td>
                        <td><?php echo $values["item_quantity"]; ?></td>
                        <td>R <?php echo $values["item_price"]; ?></td>
                        <td>R <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                        <td><a href="products.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span
                                    class="text-danger">Remove</span></a></td>
                    </tr>
                    <?php
                        $total = $total + ($values["item_quantity"] * $values["item_price"]);
                    }
                    ?>
                    <tr>
                        <td colspan="3" align="right">Total</td>
                        <td align="right">R <?php echo number_format($total, 2); ?></td>
                        <td></td>
                    </tr>
                    <?php
                }
                ?>

                </table>
            </div>
            <form method="post" action="checkout.php">
                <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Checkout"
                    <?php echo (empty($_SESSION["shopping_cart"])) ? 'disabled' : ''; ?> />
            </form>
        </div> 
    </div>
    </div>
    <br />
</body>

</html>