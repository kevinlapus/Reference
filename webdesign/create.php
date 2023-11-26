<?php
//initialize
$servername = "localhost";
$username = "root";
$password = "";
$database = "myshop";

//create connection
$connection = new mysqli($servername, $username, $password, $database);

//initialize
$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";
$successMessage = "";

//To get input
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    //checking input not empty
    do {
        if (empty($name) || empty($email) || empty($phone) || empty($address)) {
            $errorMessage = "All the Fields are required";
            break;
        }
        // add new client to data base
        $sql = "INSERT INTO clients(name, email, phone, address)" .
            "VALUES('$name','$email','$phone','$address')";
        $result = $connection->query(($sql));
        if (!$result) {
            $errorMessage = "Invaid Query: " . $connection->error;
            break;
        }

        $name = "";
        $email = "";
        $phone = "";
        $address = "";

        $successMessage = "Client Added {$_POST["name"]}";
        header("location: /webdesign/crude.php");
        exit;
    } while (false);
}
?>
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
                        <a href="crude.php">Saved Data</a>
                    </li>

                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->


    <!-- Create PHP -->
    <div class="container_edit">
        <?php
        if (!empty($errorMessage)) echo $errorMessage;
        ?>
        <?php
        if (!empty($successMessage)) echo $successMessage;
        ?>
        <form method="post">
            <label> Name:</label> <input type="text" name="name" value="<?php echo $name; ?>"><br>
            <label>Email:</label> <input type="text" name="email" value="<?php echo $email; ?>"><br>
            <label>Phone:</label> <input type="text" name="phone" value="<?php echo $phone; ?>"><br>
            <label>Adress:</label> <input type="text" name="address" value="<?php echo $address; ?>"><br>

            <button type="submit"> submit </button>
            <button> <a style="text-decoration: none;color:white;" href=" /webdesign/crude.php"> Cancel </a> </button>
        </form>
    </div>

    <!-- End Create PHP -->




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