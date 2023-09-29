<?php

include('../includes/header.php');

if (isset($_POST['register_btn'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    if ($password == $cpassword) {
        $query = "SELECT * FROM users WHERE username=?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $query_run = mysqli_stmt_get_result($stmt);

        if ($query_run) {
            if (mysqli_num_rows($query_run) > 0) {
                echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!"); window.location="register.php";</script>';
            } else {
                $insert_query = "INSERT INTO users (username, password) VALUES (?, ?)";
                $stmt = mysqli_prepare($con, $insert_query);
                mysqli_stmt_bind_param($stmt, "ss", $username, $password);
                $insert_query_run = mysqli_stmt_execute($stmt);
                
                if ($insert_query_run) {
                    echo '<script type="text/javascript">alert("User Registered.. Welcome, please log in!"); window.location="login.php";</script>';
                    $_SESSION['username'] = $username;
                } else {
                    echo '<script type="text/javascript">alert("Error: User registration failed. ' . mysqli_error($con) . '"); window.location="register.php";</script>';
                }
            }
        } else {
            echo '<script type="text/javascript">alert("Database Error"); window.location="register.php";</script>';
        }
    } else {
        echo '<script type="text/javascript">alert("Password and Confirm Password do not match"); window.location="register.php";</script>';
    }
} else {
    echo 'Invalid request.';
}
?>
