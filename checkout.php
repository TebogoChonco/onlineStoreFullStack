<?php
session_start();
require_once './config/database.php';

if (!isset($_SESSION['user_username'])) {
    header("Location: login.php");
    exit();
}

// Get the username from the session
$user_username = $_SESSION['user_username'];

// Query the database to retrieve email and full name
$query = "SELECT email, fullname FROM users WHERE username = ?";
$stmt = $conn->prepare($query);

if (!$stmt) {
    die("Query preparation failed: " . $conn->error);
}

$stmt->bind_param("s", $user_username);

if (!$stmt->execute()) {
    die("Query execution failed: " . $stmt->error);
}

$result = $stmt->get_result();

if ($result->num_rows == 1) {
    // User found, fetch email and full name
    $user_data = $result->fetch_assoc();

    // Now you can access email and full name
    $user_email = $user_data['email'];
    $user_fullname = $user_data['fullname'];
}

// Initialize variables to calculate the total price
$total_price = 0;

if (isset($_POST["submit_checkout"])) {
    // Retrieve the total price from the previous page (products.php)
    if (isset($_SESSION["total_price"])) {
        $total_price = $_SESSION["total_price"];
    } else {
        $total_price = 0;
    }

    // Generate a random order number (you can use a more sophisticated method)
    $order_number = "ORD-" . mt_rand(1000, 9999);

    // Save the order information in the database after address is submitted
    if (isset($_POST["address"])) {
        $user_id = $_SESSION['user_id']; // Assuming you have a user ID in the session
        $product_ids = array();
        foreach ($_SESSION["shopping_cart"] as $item) {
            $product_ids[] = $item["item_id"];
            $total_price += $item["item_quantity"] * $item["item_price"];
        }
        $product_ids_str = implode(',', $product_ids);

        // Insert the order into the database
        $address = $_POST["address"];
        $insert_query = "INSERT INTO orders (userID, productID, orderNumber, address) VALUES ('$user_id', '$product_ids_str', '$order_number', '$address')";
        mysqli_query($conn, $insert_query);

        // Clear the shopping cart after successful checkout
        $_SESSION["shopping_cart"] = array();
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Checkout</title>
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
    </div>

    <div class="container">
        <h1>Checkout</h1>

        <!-- Display user's email and full name -->
        <p>User Name: <?php echo $user_fullname; ?></p>
        <p>Email: <?php echo $user_email; ?></p>

        <!-- Display products bought before billing -->
        <h3>Products Bought:</h3>
        <ul>
            <?php
                $total = 0; // Initialize the total price variable
                foreach ($_SESSION["shopping_cart"] as $item) {
               $total += $item["item_quantity"] * $item["item_price"];
            ?>
            <li><?php echo $item["item_name"]; ?> - Quantity: <?php echo $item["item_quantity"]; ?> - Price: R
                <?php echo $item["item_price"]; ?></li>
            <?php } ?>

        </ul>

        <!-- Billing details form (collects address) -->
        <hr>
        <h3>Billing Details:</h3>
        <form method="post" action="">
            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea><br><br>
            <button type="submit" name="submit_checkout" value="Complete Checkout">Checkout</button>
        </form>

        <!-- Display order summary (invoice) after submission -->
        <?php if (isset($_POST["submit_checkout"])) { ?>
        <h3>Order Summary (Invoice)</h3>
        <p>Order Number: <?php echo $order_number; ?></p>
        <p>Billing Details:</p>
        <p>Name: <?php echo $user_fullname; ?></p>
        <p>Email: <?php echo $user_email; ?></p>
        <p>Address: <?php echo $_POST["address"]; ?></p>
        <p>Products:</p>
        <li><?php echo $item["item_name"]; ?> - Quantity: <?php echo $item["item_quantity"]; ?> - Price: R
                <?php echo $item["item_price"]; ?></li>
        <ul>
            <?php foreach ($_SESSION["shopping_cart"] as $item) { ?>
            <li><?php echo $item["item_name"]; ?> - Quantity: <?php echo $item["item_quantity"]; ?> - Total Price: R
                <?php echo number_format($item["item_quantity"] * $item["item_price"], 2); ?></li>
            <?php } ?>
        </ul>
        <p>Total Price: R <?php echo number_format($total_price, 2); ?></p>
        <?php } ?>
    </div>
</body>

</html>