<?php
// Start a PHP session
session_start();

// Step 1: Destroy the session
session_destroy();

// Step 2: Redirect to the login page or any other desired page after logout
header("Location: index.php"); // Redirect to the login page (or any other page you prefer)
exit();
?>
