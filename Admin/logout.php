<?php
// Start a PHP session
session_start();

// Step 1: Destroy the session
session_destroy();

// Step 2: Redirect to the login page after logout
header("Location: login.php"); // Redirect to the login page 
exit();
?>
