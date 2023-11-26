<?php
//initialize
$servername = "localhost";
$username = "root";
$password = "";
$database = "myshop";

//create connection
$connection = new mysqli($servername, $username, $password, $database);
//initialize
$id = "";
$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //Get method: Show the data of the client
    if (!isset($_GET["id"])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "myshop";

        //create connection
        $connection = new mysqli($servername, $username, $password, $database);
    }

    $id = $_GET["id"];
    // read the row of the selectect client from database
    $sql = "SELECT * FROM clients WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: /webdesign/crude.php");
        exit;
    }

    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
    $address = $row["address"];
} else {
    //POST method: Update the data of the client
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    do {
        if (empty($id) || empty($name) || empty($email) || empty($phone) || empty($address)) {
            $errorMessage = "<h2 style=\"color:red; \">All the Fields are required</h2>";
            break;
        }
        $sql = "UPDATE clients " .
            "SET name = '$name', email= '$email', phone = '$phone', address = '$address' " .
            "WHERE id = $id";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "Client updated correctly";
        header("location: /webdesign/crude.php");
        exit;
    } while (true);
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
                        <a href="create.php">Add</a>
                    </li>

                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->


    <!-- editphp -->
    <div class="container_edit">
        <?php
        if (!empty($errorMessage)) echo $errorMessage;
        ?>
        <?php
        if (!empty($successMessage)) echo $successMessage;
        ?>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>"><br>
            Name: <input type="text" name="name" value="<?php echo $name; ?>"><br>
            Email: <input type="text" name="email" value="<?php echo $email; ?>"><br>
            Phone: <input type="text" name="phone" value="<?php echo $phone; ?>"><br>
            Adress: <input type="text" name="address" value="<?php echo $address; ?>"><br><br>

            <button type="submit"> submit </button>
            <a href="/webdesign/index.html"> <button>Cancel</button> </a>
        </form>
    </div>
    <!-- end editphp -->




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