<?php 

include('server.php');

$kevin = $_GET['lapus'];

$query = "DELETE FROM users WHERE id =".$kevin.";" ;
       
mysqli_query($db,$query);
mysqli_close($db);

header("location:userr.php");

 
?>
 