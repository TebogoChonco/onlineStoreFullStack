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
    <title>User Dashboard</title>
</head>

<body>
    <div>
    <?php require_once './includes/navbar.php' ?>
    </div>
    <br>
    <div class="container">
        <div class="header">
            <h2>Users Dashboard</h2>
        </div>
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>
                            <?php
                            $sql = "SELECT COUNT(*) AS user_count FROM users";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $userCount = $row["user_count"];
                                echo $userCount;
                            } else {
                                echo "No users found.";
                            }
                            ?>
                        </h1>
                        <h3>Total Users</h3>
                    </div>
                    <div class="icon-case">
                        <img src="./assets/images/users.png" width="50px" alt="">
                    </div>
                </div>
                <!-- Add more cards for user-related statistics here -->
            </div>

            <div class="content-2">
                <div class="user-list">
                    <div class="title">
                        <h2>All Users</h2>
                        <li><a href="viewUsers.php"><button class="btn" id="viewBtn">View All</button></a></li>
                        <li><a href="addUser.php"><button class="btn" id="addBtn">Add User</button></a></li>
                    </div>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Option</th>
                        </tr>

                        <?php
                        $sql = "SELECT * FROM users LIMIT 5";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row["username"] ?></td>
                                    <td><?php echo $row["email"] ?></td>
                                    <td><?php echo $row["role"] ?></td>
                                    <td><a href="#" class="btn">View</a></td>
                                </tr>
                            <?php }
                        } else {
                            echo "No users found.";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

