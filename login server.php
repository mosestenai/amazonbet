<?php error_reporting (E_ALL ^ E_NOTICE);?>
<?php

session_start();
require 'config.php';

//checking if the user has entered both the username and password
 if (isset($_POST['login_user'])) {
  $username = ($_POST['username']);
  $password = ($_POST['password']);
	//displaying an error message when a fied is empty
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
//checking in the database if the username and paaword exists
  if (count($errors) == 0) {
  	$query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
	$query2 = "SELECT * FROM admin WHERE username='$username'";
  	$results = $db->query($query);
	$results2 = $db->query($query2);
	//logging in the user if the credentials are found in the database
  	if ($results->rowCount() == 1) {
	$user=$results->fetch(PDO::FETCH_OBJ);
	if(password_verify($password,$user->password) == 1){
		$_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: testodds.php');
	
	}
  	}
	if ($results2->rowCount() == 1) {
	$user=$results2->fetch(PDO::FETCH_OBJ);
	if(password_verify($password,$user->password) == 1){
		
	  $_SESSION['username']=$username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: admin.php');
  	
	}
	}
	
  //displaying an error message if there password of username wrongly entered 
	else {
  		array_push($errors, "Wrong username/password");
  	}
  }
 }
 
?>