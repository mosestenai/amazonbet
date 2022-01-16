<?php
session_start(); 
if (isset($_SESSION['username']) != 'main admin') {
  	echo "Restricted access";
  }
  else{
  ?>
  
<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<title>admin odds</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="newbody">
<header class="navheader">

<h1></h1>
<input type="checkbox" class="nav-toggle" id="nav-toggle">
<p><font color="white"> </font></p>
<nav class="navburger">
   <br>
   <ul>
     <li>
	    <a href="index.php"><h2>home</h2></a>
		<br><br>
	</li>	
	 <li>
	    <a href="payments.php"><h2>Check payments</h2></a>
		<br><br>
	</li>
	
</ul>
</nav>
<label for="nav-toggle" class="nav-toggle-label">
<span></span></label><font color="white"></font><p class="head"><font color="white"><i>Amazon bet</i></font>
<font color="yellow">Sure Football Predictions</font></p>
</header>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<form method="post" class="newform">
<?php include('errors.php'); ?><br>
<div class="input-group">
<label>DATE</label>
<input type="date" name="odd1" >
</div><br>
<div class="input-group">
<label>TYPE OF LEAGUE eg epl/ turkish league</label>
<input type="text" name="odd2" >
</div><br>
<div class="input-group">
<label>GAME PLAYING TIME eg 20:00hrs</label>
<input type="text" name="odd3">
</div><br>
<div class="input-group">
<label>TEAMS PLAYING eg man u vs arsenal</label>
<input type="text" name="odd4">
</div><br>
<div class="input-group">
<label>Tip eg CORRECT SCORE FT 3:1 Odd:2.40</label>
<input type="text" name="odd5">
</div><br>
<p align="middle"><button type="submit" class="loginbtm" name="post_odds">SUBMIT</button></p>

&copy 2021 <font color="teal"><u>AMAZONBET</u></font>. Powered by <a href="www.eazistey.co.ke/softwaredeveloper.php"><font color="teal">TENAI TECH</font></a>
 <br>

</form>

</body>
</html>
<?php
  }
?>