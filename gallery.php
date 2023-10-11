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

    <div class="imgContainer">
        <?php
        $query = "SELECT * FROM products ORDER BY productID ASC";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
        ?>
        <div class="galleryPage-container">
            <form method="post" action="products.php?action=add&id=<?php echo $row["productID"]; ?>">
                <div class="galleryPage">
                    <img src="./Images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />
                    <h4 class="text-info"><?php echo $row["productName"]; ?></h4>
                </div>
            </form>
        </div>
        <?php
            }
        }
        ?>

</body>

</html>