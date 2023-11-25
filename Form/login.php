<?php
session_start();
//initialize
$servername = "localhost";
$username = "root";
$password = "";
$database = "myshop";

//create connection
$conn = mysqli_connect($servername, $username, $password, $database);
?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles.css">
    <title>Home User</title>
</head>

<body>

    <h1>
        <h3><a style="text-decoration: none; color:white ;" href="/form/index.php"> Home </a>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a style="text-decoration: none;color:white ;" href="/form/create.php"> Register </a>
        </h3>
    </h1>
    <hr><br><br>
    <div class="container">


        <h1>Login Form </h1>
        <form action="login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">

            <!-- <label for="password">Password:</label>
            <input type="password" id="password" name="password"> -->
            <input type="submit" name="login" value="login"> <br><br>
        </form>
    </div>
    <?php
    if (isset($_POST['login'])) {
        $email = $_POST['email'];

        $select = mysqli_query($conn, "SELECT * FROM clients WHERE email='$email'");
        $row = mysqli_fetch_array($select);

        if (is_array($row)) {
            $_SESSION["email"] = $row['email'];
        } else {
            echo '<script type = "text/javascript">';
            echo 'alert("Invalid Email");';
            echo 'window.location.href = "login.php"';
            echo '</script>';
        }
    }
    if (isset($_SESSION["email"])) {
        header("location: /form/index.php");
    }

    ?>
</body>

</html>