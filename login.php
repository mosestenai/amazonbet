
<?php include('login server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>User login</title>
  <link rel="stylesheet" href="style.css">
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
	    <a href="sign up.php"><h2>Sign up</h2></a>
		<br><br>
	</li>	
	 <li>
	    <a href="viewpost.php"><h2>Announcements</h2></a>
		<br><br>
	</li>
	 <li>
	    <a href="index.php"><h2>home</h2></a>
		<br><br>
	</li>
	
</ul>
</nav>
<label for="nav-toggle" class="nav-toggle-label">
<span></span></label><font color="white"></font><p class="head"><font color="white"><i>Amazon bet</i></font>
<font color="yellow">Sure Football Predictions</font></p>
</header>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<form method="post" action="login.php" class="newform">
<?php include('errors.php'); ?><br><br><?php
$message= $_GET['message'];
if(!empty($message)){
echo '<h3 align ="middle"><font color="red">'.$message.'</font></h3>';
}
?><br>
<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username">
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
	  </div>
	  <br>
	  <p align="middle"><button type="submit" class="loginbtm" name="login_user" >LOGIN >></button></p>	
  	<br>
	
	Forgot password? <a href="reset pass.php" title="click here to reset your password"><font color="navy"> Reset password</font></a><br>
	<?php
	if (isset($_GET["newpwd"])){
	 if  ($_GET["newpwd"] == "passwordupdated"){
	 echo '<p align="middle"><font color="blue">Your password has been reset!</font></p>';
	 }
	}
	?>
<br><br>
Don't have an account? <a href="sign up.php" title="click here to create a new account"><font color="navy"> Create an account</font></a> <br>
	<footer>
	&copy 2021. <font color="teal"><u>AMAZONBET</u></font>. Powered by <a href="www.eazistey.co.ke/softwaredeveloper.php"><font color="teal">TENAI TECH</font></a>
	</footer>
	
  </form>
  
 
  </body>
  </html>
