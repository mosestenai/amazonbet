<?php error_reporting (E_ALL  ^ E_NOTICE && E_WARNING);?>
<?php include 'reset_linkk.php';?>
<html>	
<head>
  <title>create#ne%pass</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
  <body><br><br>
  <p align="center">
<img src="images/logo1.jpg" width="250" height="150"></p><br>
    
	<?php
	  $selector = $_GET["selector"]; //getting the token(selector and validator) inside the url
	  $validator = $_GET["validator"]; 
	  $po = $_GET["campus"];
	  $_SESSION['campus']= $po; 
	  //checking if there exist a token
	  
		 ?>
		 <form action ="create-new-password.php" method="post">
		 <?php include('errors.php'); ?>
		   <input type="hidden" name="selector" value="<?php echo $selector ?>">
		   <input type="hidden" name="validator" value="<?php echo $validator ?>">
		    <div class="input-groupp">
	  <br>
		   <input type="password" name="pwd" placeholder="Enter a new password,,"><br>
		   <br><br>
		   <input type="password" name="pwd-repeat" placeholder="Repeat new password,,"></div><br><br><br>
		   <button type="submit" class="loginbtn" name="reset-linkk-submit">Reset password</button>
		</form>
    </form>