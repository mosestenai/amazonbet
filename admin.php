<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
if (isset($_SESSION['username']) != 'main admin') {
  	echo "Restricted access";
  }
 ?>
<html>
<head><title>
admin</title>
<link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta http-equiv="refresh" content="60">
</head>
<body>
<br><br>
<header class="navheader">
<h1></h1>
<input type="checkbox" class="nav-toggle" id="nav-toggle">
<nav class="navburger">
   <br><br>
   <ul>
	<li>
	    <a href="users.php"><h2>VIEW USERS</h2></a>
		<br><br>
	</li>
	<br><br
	 <li>

	    <a href="index.php"><h2>LOGOUT</h2></a>
		<br><br>
	</li>
</ul>
</nav>
<label for="nav-toggle" class="nav-toggle-label">
<span></span></label><font color="white"></font><p class="head"><font color="white"><i>Amazon bet</i></font>
<font color="yellow">Sure Football Predictions</font></p>
</header><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="fieldset-contact" align="middle">
<br>
<h1 align="middle">DASHBOARD</h1><br><br>
<a href="viewusers.php"><button class="bet">View Users</button></a>
<br /><br><br>
<a href="addadmin.php"><button class="bet">Add another admin</button></a>
<br><br><br>
<a href="adminodds.php"><button class="bet">Post Odds</button></a>
<br><br><br>
<a href="payments.php"><button class="bet">View Payments</button></a>
<br><br><br>
</div>


</body>
</html>