<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles.css">

    <title>Home User</title>
</head>

<body>

    <h1>My Website Crude
        <h3><a style="text-decoration: none; color:white ;" href="/form/index.php"> Home &nbsp&nbsp &nbsp&nbsp&nbsp</a>
            <?php
            if (empty($_SESSION['email'])) {
                echo "Visitor";
            } else {
                echo $_SESSION['email'];
            }

            ?>
            &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a style="text-decoration: none;color:white ;" href="/form/create.php"> Add User </a>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a style="text-decoration: none;color:white ;" href="/form/logout.php"> Logout </a>
        </h3>
    </h1>
    <hr><br><br>
    <center>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>ADDRESS</th>
                    <th>CREATED AT</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "myshop";

                //create connection
                $connection = new mysqli($servername, $username, $password, $database);

                //check connection
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }
                // read all row from database table
                $sql = "SELECT * FROM clients";
                $result = $connection->query($sql);
                if (!$result) die("Invalid query: " . $connection->error);
                // else echo "List of data &nbsp", '<a href="/form/create.php"> Add User</a>';
                // read data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "
                <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[created_at]</td>
                    <td>
                        <a href='/form/edit.php?id=$row[id]'> <button>Edit</button></a>
                        <a href='/form/delete.php?id=$row[id]'> <button>Delete</button></a>
                    </td>
                </tr>
                    ";
                }
                ?>

            </tbody>
    </center>
    </table>
</body>

</html>