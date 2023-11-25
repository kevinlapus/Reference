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
        header("location: /form/index.php");
        exit;
    } while (false);
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles.css">
    <title>Add User</title>
</head>

<body>


    <h1>ADD USERS
        <h3><a style="text-decoration: none; color:white ;" href="/form/index.php"> Home </a>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
            <label> Name:</label> <input type="text" name="name" value="<?php echo $name; ?>"><br>
            <label>Email:</label> <input type="text" name="email" value="<?php echo $email; ?>"><br>
            <label>Phone:</label> <input type="text" name="phone" value="<?php echo $phone; ?>"><br>
            <label>Adress:</label> <input type="text" name="address" value="<?php echo $address; ?>"><br>

            <button type="submit"> submit </button>
            <button> <a style="text-decoration: none;color:white;" href=" /form/index.php"> Cancel </a> </button>
        </form>
    </div>



</body>

</html>