<?php include('server.php') ?>
 <?php 
	//session_start(); 

	if (!isset($_SESSION['username'])) {
		echo $_SESSION['msg'] = "You must log in first";
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
	<title>About</title>
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
	</nav> <br><br>

<!-- CONTAINER VALUE FOR THE MARGIN -->
<div class="container">
     
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

<center><H1>MY MASTERS</h1><img src="images\myteacher.png"  >
   
    </div>





</center>
 
    <center><div class="box-block">
     	<h3>Cymyr MoseS</h3>
        <P>THE SUPERVISOR</P>
		<img src="images\cymer.png"  height="200" width="160">
  </div>

  <div class="box-block">
     	<h3>Arvin Provida,</h3>
        <P>THE COMMANDER</P>
		  <img src="images\arvin.png"  height="200" width="160">
  </div>

   <div class="box-block">
     	<h3>Reymark Monleon</h3>
        <P>THE ENCODER</P>
		<img src="images\raymark.png"  height="200" width="160">
 </div>  
    
     <div class="box-block">
     	<h3>Tj Monterde</h3>
        <P>HARDTRAB</P>
		<img src="images\epilan.png"  height="200" width="160">
 </div>  
        
    <div class="box-block">
     	<h3>MR, D. UY</h3>
        <P>MY PROFESSOR</P>
		<img src="images\masterphp.png"  height="200" width="160">
     </div>
     <div class="box-block">
     	<h3>Kevin Villadolid Lapus,</h3>
        <P>HELPER</P>
		<img src="images\kevin1.png"  height="200" width="160">
 </div>  
    
       </center>
     <div id="mainbox"><br><br><br>
  	   </div>
  
     <div id="##"> 
	  
	 </div>
    
 
     <div id="mainbox"><br><br><br>
  	    <h3>ALL ABOUT US</h3>
        <P>We are trying the best result to make this offline website to made it better i forgot the previous lesson of html and css it was last year first SEM
thats why the user interface of this page so lol jajaja by the way  big thanks to MR.D UY for teaching php language of us thats all thank you :)  ,,.	</P>
     </div>
  
     <div id="sidebox"> 
	   <center> <h3>I AM KEVIN,</h3>   <P>The basics "PROGRAMER"  :{</P>
               a Collegge student  in
                              Consolatrix College of Toledo City,INC
                               eager to learn everything in programming !!!
        <img src="images\kevinlapus.jpg"  height="100" width="150"> </center>
	 </div>
  
</div><!--  container -->
 
       <div class="pbox">
     	<h1>DUWAEE GUD!!</h1>
        
        <h2>PARA MALINGAW KA ;)</h2><br>
		
        
        
        <script>
window.onload = function() {
    canvas =
      document.getElementById("canvas");
 ctx = canvas.getContext("2d");
 
 gameReset();
 highScore = 0;
 setInterval(draw,1000/60);
 setInterval(createPipe, 2400);
 /*
 ctx.shadowOffsetX = -3;
    ctx.shadowOffsetY = 3;
    ctx.shadowColor = "#111";
    ctx.shadowBlur = 10;
    */
}

var gameStarted = false;

function draw() {
    
    var gradient = ctx.createLinearGradient(0,canvas.width,0,canvas.height + 90);
    gradient.addColorStop(0, "pink");
    gradient.addColorStop(1, "teal");
    
    drawRect(0,0, canvas.width,canvas.height, gradient);
    
        ctx.beginPath();
    ctx.fillStyle = "orange";
    ctx.arc(canvas.width - 50, 80, 8,0, Math.PI*2);
    ctx.fill();
    ctx.closePath();
    
    drawClouds();
    drawBuilding();
    
    for(var i=0; i<cloud.length; i++) {
            cloud[i].draw();
    }
    
    for(var c=0; c<cloud.length; c++) {
        if(cloud[c].x + cloud[c].w < 0) {
            cloud.splice(c, 1);
        }
    }
    for(var b=0; b<building.length; b++) {
        if(building[b].x + building[b].w < 0) {
            building.splice(b, 1);
        }
    }
    
    for(var i=0; i<building.length; i++) {
        building[i].draw();
    }
    
    if(score >= highScore) {
        highScore = score;
    }
    
    drawBird();
    drawPipes();
    checkCollision();
    
    if(gameStarted == false) {
        yVelocity = 0;
        pipe.splice(0, pipe.length);
        ctx.textAlign = "center";
        ctx.font = "bold 35px arial";
        ctx.fillStyle = "crimson";
        ctx.fillText("Flappy Circle", canvas.width/2, canvas.height/2);
        ctx.fillStyle = "black";
        ctx.font = "15px arial";
        ctx.fillText("Tap To Start", canvas.width/2, canvas.height/2 + 45);
        ctx.fillText("Kevin Villadolid Lapus", canvas.width/2, canvas.height - 55);
    }
    
    if(playerDead) {
        ctx.textAlign = "center";
        ctx.fillStyle = "crimson";
        ctx.font = "bold 40px arial";
        ctx.fillText("Game Over!", canvas.width/2, canvas.height/2);
        ctx.font = "20px arial";
        ctx.fillText("Tap To Restart", canvas.width/2, canvas.height/2 + 50);
    }
    
    ctx.fillStyle = "black";
    ctx.textAlign = "right";
    ctx.font = "bold 17px arial";
    ctx.fillText("Score: " + score, 
    canvas.width - 10, 25);
    
    ctx.textAlign = "left";
    ctx.fillText("Highscore: " + highScore, 10, 25);
}

var module = 0;

function drawClouds() {
    module++;
    
    if(module % 60 == 0) {
        var newCloud = new cloudClass()
        cloud.push(newCloud);
    }
}

var moduleTwo = 0;

function drawBuilding() {
    moduleTwo++;
    if(moduleTwo % 30 == 0) {
        var newBuild = new buildingClass();
        newBuild.y = canvas.height - newBuild.h;
        building.push(newBuild);
    }
}

var building = [];

function buildingClass() {
    this.x = canvas.width;
    this.y;
    this.w = 20+ Math.random()*40;
    this.h = 10+ Math.random()*40;
    this.color = "silver";
    
    var color = Math.random()*2;
    if(color >= 0 &&
       color <= 0.7) {
           this.color = "#046C94";
       }
    else if(color > 0.7 &&
       color <= 2) {
           this.color = "silver";
       }
       
      this.draw = function() {
          if(playerDead == false &&
             gameStarted) {
          this.x += pipeVelocity + 0.5;
          }
          
          drawRect(this.x, this.y, this.w, this.h, this.color);
      }
}

var cloud = [];

function cloudClass() {
    this.x = canvas.width;
    this.y = Math.random()*canvas.height/2;
    this.w = 20+ Math.random()*30;
    this.h = 15+ Math.random()*20;
    this.velX = 0.5 + Math.random();
    
    var color = Math.random();
    if(color <= 0.8) {
        this.color = "white";
    } else {
        this.color = "#999"
    }
    
    this.draw = function() {
        if(playerDead == false &&
           gameStarted) {
        this.x -= this.velX;
        }
        
        ctx.beginPath();
        ctx.fillStyle = this.color;
        ctx.fillRect(this.x, this.y, this.w, this.h);
        ctx.closePath();
    }
}


function gameReset() {
    playerX = 50;
    playerY = canvas.height/2;
    playerS = 10;
    playerColor = "crimson";
    gravity = 0.3;
    yVelocity = 0;
    score = 0;
    gameStarted = false;
    playerDead = false;
    pipeVelocity = -1.5;
    pipeYVelocity = 0;
    showTitleScreen = false;
    gapHeight = 120;
 pipeWidth = 50;
    
    pipe.splice(0, pipe.length);
}

var pipe = [];
var gap = [];

function createPipe() {
    var gapY = Math.random()*canvas.height/2;
    
    var pipeTop = new pipeClass();
    pipeTop.y = - canvas.height;
    pipeTop.h = gapY + canvas.height;
    pipe.push(pipeTop);
    
    var pipeBottom = new pipeClass();
    pipeBottom.y = gapY + gapHeight;
    pipeBottom.h = canvas.height;
    pipe.push(pipeBottom);
}
        
function drawPipes() {
    
    for(var i=0; i<pipe.length; i++) {
        pipe[i].move();
        pipe[i].draw();
        }
        
        for(var i=0; i<pipe.length; i++) {
        if(pipe[i].x <= -pipe[i].w) {
            pipe.splice(i, 1);
     }
    }
}

function checkCollision() {
    for(var i=0; i<pipe.length; i++) {
        if(playerX - playerS > pipe[i].x + pipe[i].w &&
           pipe[i].passed == false) {
               pipe[i].passed = true;
               score+=0.5;
        }
        
        if(playerX + playerS >= pipe[i].x &&
           playerX - playerS <= pipe[i].x + pipe[i].w &&
           playerY + playerS >= pipe[i].y &&
           playerY - playerS <= pipe[i].y + pipe[i].h) {
           pipeVelocity = 0;
           playerDead = true;
           }
           
         //Player Stays On Top Of A Pipe
         if(playerX + playerS > pipe[i].x+1 &&
            playerX - playerS < pipe[i].x + pipe[i].w &&
            playerY + playerS >= pipe[i].y &&
            playerY + playerS <= pipe[i].y + 10 &&
            yVelocity > 0) {
                yVelocity *= -0.2;
                playerY = pipe[i].y - playerS;
            }
            
        //Player Can Hit Bottom Of Pipe
        if(playerX + playerS > pipe[i].x &&
           playerX - playerS < pipe[i].x + pipe[i].w &&
           playerY - playerS <= pipe[i].y + pipe[i].h &&
           playerY - playerS >= pipe[i].y + pipe[i].h - 10 &&
           yVelocity < 0) {
               yVelocity *= -0.1;
               playerY = pipe[i].y + pipe[i].h + playerS;
           }
    }
    
    if(playerY + playerS >= canvas.height) {
        pipeVelocity = 0;
        playerDead = true;
        playerY = canvas.height - playerS;
        yVelocity *= -0.3;
    }
    
    if(playerY - playerS <= 0) {
        yVelocity *= -0.3;
        playerY = playerS;
    }
}

function pipeClass() {
    this.x = canvas.width;
    this.y = 0;
    this.velX = pipeVelocity;
    this.velY = pipeYVelocity;
    this.color = "lightgreen";
    this.w = pipeWidth;
    this.h = 0;
    this.passed = false;
    
    this.move = function() {
        this.x += pipeVelocity;
        this.y += pipeYVelocity;
    }
    
    this.draw = function() {
        drawRect(this.x, this.y, this.w, this.h, this.color);
        
        if(this.y >= canvas.height) {
            pipeYVelocity *= -1;
        }
        if(this.y + this.h <= 0) {
            pipeYVelocity *= -1;
        }
        
    }
}

function drawBird() {
    playerY += yVelocity;
    yVelocity += gravity;
    
    drawCircle(playerX, playerY, playerS, playerColor);
}

document.addEventListener("click", flap);

function flap() {
    if(gameStarted == false) {
        gameStarted = true;
    }
    if(playerDead) {
        gameReset();
        playerDead = false;
    }
    if(playerDead == false) {
    yVelocity = -7;
     }
    if(showTitleScreen) {
        gameReset();
    }
}

//Rectangle Code
function drawRect(topLeftX,topLeftY, width,height, color) {
ctx.beginPath();
ctx.fillStyle = color;
ctx.rect(topLeftX,topLeftY,width,height);
ctx.fill();
ctx.stroke();
ctx.closePath();
}
//Circle Code
function drawCircle(x, y, radius, color) {
    ctx.beginPath();
    ctx.fillStyle = color;
    ctx.lineWidth = 1.5;
    ctx.arc(x, y, radius, 0, Math.PI*2);
    ctx.fill();
    ctx.stroke();
    ctx.closePath();
}
          
      </script>     
   </head>
   <body bgcolor="#444">
   <div style="display: flex; 
   justify-content: center;"> 
      <canvas id="canvas" 
      width="350px" 
      height="450px" 
      style="display: block;
      border-radius: 15px;
      border: 2px solid black;"></canvas>
      </div>      
     </div>



<!-- this an social hyper link  psition -->
<a class="fixme button"href="#">K<BR>E<BR>V<BR>I<BR>N</a>

<BR><BR><BR><BR><BR><BR>

	<footer id="main-footer">
    	<marquee behavior="alternate" direction="right"> MADE BY : CONSOLATRICIANS STUDENTS</marquee>
    </footer>

</body>
</html>