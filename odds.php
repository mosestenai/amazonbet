<?php
session_start(); 
if (!isset($_SESSION['username'])) {
  	header('location: login.php?message=login first in order to buy a ticket.');
  }else{
    require 'config.php';
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <title>oddsaccount</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <p class="head" align="middle"><font color="teal"><i>Amazon bet</i></font>
<font color="yellow">Sure Football Predictions</font></p>
<form method="post" action="troj/register.php">
<br><br>
<?php include('errors.php'); ?><br><br>
<h1><font color="green">MPESA CHECKOUT</font></h1>
<div class="input-group">
  		<label>YOUR PHONE NUMBER *Note,phone number must begin with 2547</label>
  		<input type="number" name="phone" value= "2547">
  	</div>
  	You are paying 4500 kenyan shillings to Amazon bet company.
  		<input type="hidden" value="1" name='amount' >
  	<div class="input-group">
  		<button type="submit" class="loginbtn" name="pay" onclick="myFunction()">PAY</button>
  	</div><br>
	</form>
  </body>
  </html>
    <?php
  }
  ?>