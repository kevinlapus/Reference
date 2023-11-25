<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "myshop";

    //create connection
    $connection = new mysqli($servername, $username, $password, $database);
    $sql = "DELETE FROM clients WHERE id=$id";
    $connection->query($sql);
    header("location: /form/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles.css">
    <title>Delete User</title>
</head>

<body>

    <h1><?php
        $name = 'Delete';
        $lastName = 'Page';
        echo "This is {$name} {$lastName}";
        ?>
    </h1>
    <hr><br><br>


</body>

</html>