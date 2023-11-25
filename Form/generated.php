<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myshop";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, email, address FROM clients";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"] . " - Email: " . $row["email"] . " - Address: " . $row["address"] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
