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
	<title>Contact</title>
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

<div class="container">
<div style="margin-top: 60px;">
    <style>
        img{
            max-width: 100%;
            max-height: 100%;
            }
      .potrait{ 
            max-width:80px;
            max-height: 30px;
            }
    </style>
<div classs="portrait">
 <img src="images\GROUP11.png"  >
</div>
    
<CENTER> <H1>SULAT LANG DERI BAI</H1> 
    pm me in my FACEBOOK account  :} :)<br>www.facebook.com/jeskiesmiley
   <br>you can call me#:: +639365931432</CENTER>
</div>

<form class="my-form">
	<div class="form-group">
		<label>Name:</label>
		<input type="text" name="name">
	</div>

    <div class="form-group">
	<label>Email:</label>
		<input type="text" name="name">
	</div>
     
     <div class="form-group">
		<label>Message:</label>
		<textarea name="Message"></textarea>
	</div>
	<input class="button" type="submit" value="submit" name="">
</form>
</div>




	<footer id="main-footer">
     <marquee behavior="alternate" direction="right"> MADE BY : CONSOLATRICIANS STUDENTS</marquee>
    </footer>

</body>
</html>