<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="create.php">Add</a>
                    </li>

                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->


    <!-- Table -->
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
                <a href='/webdesign/edit.php?id=$row[id]'> <button>Edit</button></a>
                <a href='/webdesign/delete.php?id=$row[id]'> <button>Delete</button></a>
            </td>
        </tr>
            ";
            }
            ?>

        </tbody>
        </center>
    </table>
    <!-- End Table -->
    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png" /></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png" /></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png" /></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">Kevin Lapus</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>

</html>