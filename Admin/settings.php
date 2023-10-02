<?php
session_start();
require_once '../config/database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="products.css">
    <title>Payments</title>
</head>

<body>
    <div>
        <?php require_once './includes/navbar.php' ?>
    </div>
    <br>
    <div class="container">
        <div class="header">
            <h2>Settings Dashboard</h2>
        </div>
        <div class="content">
            <p>
                This page will contain all the settings needed edit the Users side of the web page.
            </p>
        </div>
    </div>
</body>

</html>