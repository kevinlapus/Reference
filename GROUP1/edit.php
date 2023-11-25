
<?php include('server.php') ?>
<?php 
	//session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Gallery</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header id="main-header">
	  <div class="container">
		       <center>  <h1><embed src="images\Cctc.png" height="25" width="50">THE CONSOLATRICIAN</h1> </center>
	  </div>
	</header>

	<nav id="navbar">
	  <div class="container">
		 <center><ul>
			<li> <a class="button" href="index.php">Home</a></li>
			<li> <a class="button" href="userr.php">UserList</a></li>
			<li> <a class="button" href="About.php">About</a></li>
			<li> <a class="button" href="Contact.php">Contact</a></li>
                        <li> <a class="button" href="index.php?logout='1'" style="color: red;">logout</a></li>      
		</ul>
              </center>
	  </div>
	</nav>




<div class="box c">
      <div class="box-2">
     	<center><h1>TYPE LANG DERI BAI :)</h1>
       <?php

include('server.php');

$user_id = $_REQUEST["id"];


   

$get_record = mysqli_query($db,"SELECT * FROM users WHERE id='$user_id'");
while($row_edit = mysqli_fetch_assoc($get_record)){
    
       $a = $row_edit["a"] ; 
        $b = $row_edit["b"] ; 
         $c = $row_edit["c"] ; 
   $n = $row_edit["username"] ; 
   $m = $row_edit["email"] ; 
   $l = $row_edit["password"] ; 
  
}
 ?>
<form  method="GET" action="Update_Record.php">
    <input type="hidden" name="user_id"  value="<?php echo $user_id; ?>"><br>
           <input  type="text" name="a"  required value="<?php echo $a; ?>"><br>
            <input  type="text" name="b" required value="<?php echo $b; ?>"><br>
              <input  type="text" name="c" required value="<?php echo $c; ?>"><br>
    <input  type="text" name="n" required value="<?php echo $n; ?>"><br>
    <input  type="email" name="m" required value="<?php echo $m; ?>"><br>
    <input  type="text" name="l" required value="<?php echo $l; ?>"><br>
    <input type="submit" value="Update">
    
</form>



<style>
     
    table{  
         background: gray;
        margin:auto;
        border:solid 1px;
        border-collapse:collapse;
    }
    td{
        padding:5px;
        border:solid 1px;
    }
            
 </style>


 

     
  </div>
</div>

    








<footer id="main-footer">
    	<P>MADE BY : CONSOLATRICIAN STUDENTS</P>
    </footer>

</body>
</html>


     