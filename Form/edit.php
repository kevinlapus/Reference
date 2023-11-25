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
        header("location: /form/index.php");
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
        header("location: /form/index.php");
        exit;
    } while (true);
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles.css">
    <title>Edit User</title>
</head>

<body>

    <h1>EDIT USER
        <h3><a style="text-decoration: none; color:white ;" href="/form/index.php"> Home </a>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a style="text-decoration: none;color:white ;" href="/form/create.php"> Add User </a>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a style="text-decoration: none;color:white ;" href="/form/login.php"> Logout </a>
        </h3>
    </h1>

    <hr><br><br>
    <div class="container">
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
            <a href="/form/index.php"> <button>Cancel</button> </a>
        </form>
    </div>




</body>

</html>