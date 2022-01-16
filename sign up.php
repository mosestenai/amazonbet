
<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
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
	    <a href="login.php"><h2>Login</h2></a>
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
<?php /*include('errors.php'); */?><br>
<div class="input-group">
<label>Username</label>
<input type="text" name="username" >
</div><br>
<div class="input-group">
<label>Email</label>
<input type="email" name="email" >
</div><br><div class="input-group">
<label>Country</label>
<input type="text" name="country" >
</div><br>
<div class="input-group">
<label>Password</label>
<input type="password" name="password_1">
</div><br>
<div class="input-group">
<label>Confirm password</label>
<input type="password" name="password_2">
</div>
<br><br>
By continuing, you agree to Amazon's bet <a href="terms.php"><font color="navy">Terms of service </font></a>and <a href="terms.php"><font color="navy">Privacy Policy.</font></a>

<p align="middle"><button type="submit" class="loginbtm" name="reg_user">PROCEED</button></p>

<p>
Have an account?<a href="login.php">Log in</a>
</p><br>
&copy 2021 <font color="teal"><u>AMAZONBET</u></font>. Powered by <a href="www.eazistey.co.ke/softwaredeveloper.php"><font color="teal">TENAI TECH</font></a>
 <br>

</form>

</body>
</html>