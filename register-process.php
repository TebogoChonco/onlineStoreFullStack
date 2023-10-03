<?php
// Include the database connection script if not already included
include('config/database.php');

if (isset($_POST['register_btn'])) {
    // Retrieve user input from the registration form
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Step 4: Check if the email is unique
    $email_check_sql = "SELECT * FROM users WHERE email = ?";
    $email_check_stmt = $conn->prepare($email_check_sql);
    $email_check_stmt->bind_param("s", $email);
    $email_check_stmt->execute();
    $email_result = $email_check_stmt->get_result();

    if ($email_result->num_rows > 0) {
        // Email is not unique
        echo "Email is already registered. Please use a different email.";
    } else {
        // Step 5: Check if the phone number is unique
        $phone_check_sql = "SELECT * FROM users WHERE phone = ?";
        $phone_check_stmt = $conn->prepare($phone_check_sql);
        $phone_check_stmt->bind_param("s", $phone);
        $phone_check_stmt->execute();
        $phone_result = $phone_check_stmt->get_result();

        if ($phone_result->num_rows > 0) {
            // Phone number is not unique
            echo "Phone number is already registered. Please use a different phone number.";
        } else {

            // Prepare and execute the SQL query to insert user data into the 'users' table
            $sql = "INSERT INTO users (username, fullname, email, phone, password) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $username, $fullname, $email, $phone, $password);
            echo "line 40";
            if ($stmt->execute()) {
                header("Location:login.php"); // Redirect to the login page
                exit();
                echo "line 44";
            } else {
                echo "Error: Registration failed " . $stmt->error;
        }}
    }
   echo "line 49";
    // Close the database connection
    $email_check_stmt->close();
    $phone_check_stmt->close();
    $stmt->close();
    $conn->close();
   echo "line 55";
}
