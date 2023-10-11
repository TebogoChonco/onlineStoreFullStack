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
        <h2>Payments Dashboard</h2>
        </div>
        <div class="content">
            <div class="payment-list">
                <table>
                    <tr>
                        <th>Payment ID</th>
                        <th>User</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>

                    <?php
                    $sql = "SELECT * FROM payments";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row["payment_id"] ?></td>
                                <td><?php echo $row["user_id"] ?></td>
                                <td><?php echo "$" . $row["amount"] ?></td>
                                <td><?php echo $row["payment_date"] ?></td>
                            </tr>
                        <?php }
                    } else {
                        echo "No payments found.";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
