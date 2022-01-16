
<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	header('location: login.php');
  }
  if (isset($_SESSION['username']) != 'main admin') {
    echo 'Unauthorised access';
    }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  ?>
  <?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<title>addadmin</title>
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
</ul>
</nav>
<label for="nav-toggle" class="nav-toggle-label">
<span></span></label><font color="white"></font><p class="head"><font color="white"><i>Amazon bet</i></font>
<font color="yellow">Sure Football Predictions</font></p>
</header>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<form method="post" class="newform" >
<?php include('errors.php'); ?>
<br>
<div class="input-group">
<label>Username</label>
<input type="text" name="username" value="<?php echo $username;?>" placeholder="username"><br><br>
</div>
<div class="input-group">
<label>Email</label>
<input type="email" name="email" placeholder="Email" value="<?php echo $email;?>">
</div><br>
<div class="input-group">
<label>Country</label>
<input type="text" name="country" placeholder="Country">
</div><br>
<div class="input-group">
<label>Password</label>
<input type="password" name="password_1" placeholder="Password">
</div><br>
<div class="input-group">
<label>Confirm password</label>
<input type="password" name="password_2" placeholder="Confirm password">
</div>
<br><br>
<div class="input-group">
<button type="submit" class="loginbtn" name="reg_admin">Register</button>
</div>

&copy 2021 <font color="teal"><u>amazonbet</u></font>. Designed by <font color="teal"><u>TENAI TECH</u></font><br>
 <br>

</form>

</body>
</html>