<?php 
session_start();

// Include the database connection script if not already included
require_once '../config/database.php';


// Step 1: Retrieve data from the POST request
if (isset($_POST['login_btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Step 3: Verify the user's credentials
    $select_sql = "SELECT * FROM users WHERE username = ?";
    $select_stmt = $conn->prepare($select_sql);
    $select_stmt->bind_param("s", $username);
    $select_stmt->execute();
    $result = $select_stmt->get_result();

    if ($result->num_rows == 1) {
        // User found, verify the password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, create a session for the user
            $_SESSION['user_id'] = $row['id']; // Save user ID in session
            $_SESSION['user_username'] = $row['username'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_name'] = $row['fullname'];


            header("Location: dashboard.php"); // Redirect to a protected page (e.g., dashboard)
            exit();
        } else {
            // Password is incorrect
            $_SESSION['login_error'] = "Incorrect password";
            header("Location: index.php"); // Redirect back to the login page
            exit();
        }
    } else {
        // User not found
        $_SESSION['login_error'] = "User not found";
        header("Location: index.php"); // Redirect back to the login page
        exit();
    }
}

// Close the database connection
$conn->close();
