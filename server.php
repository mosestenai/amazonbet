<?php error_reporting (E_ALL ^ E_NOTICE);?>
<?php
session_start();
// including database connection file
require 'config.php';
// REGISTER USER

if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = ($_POST['username']);
  $email = ($_POST['email']);
  $country= $_POST['country'];
  $password_1 = ($_POST['password_1']);
  $password_2 =($_POST['password_2']);
 $expire= '0';
   // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Passwords do not match");
  }
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = $db->query($user_check_query);
  $user=$result->fetch(PDO::FETCH_OBJ);
  
 
  if ($user) { // if user exists
    if ($user->username == $username) {
      array_push($errors, "Username already exists");
    }

    if ($user->email == $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = password_hash($password_1,PASSWORD_DEFAULT,array('cost' => 9));//encrypt the password before saving in the database
     $usertable = str_replace(' ','',$username);
  	$query = "INSERT INTO users (username, email, password,country,expire) 
  			  VALUES('$username', '$email', '$password','$country','$expire')";
  	$db->query($query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: testodds.php');
  }
}


//post odds
if (isset($_POST['post_odds'])) {
  $odd1 = ($_POST['odd1']);
  $odd2= ($_POST['odd2']);
  $odd3= ($_POST['odd3']);
  $odd4= ($_POST['odd4']);
  $odd5 = ($_POST['odd5']);
$sql="INSERT INTO odds (odd1,odd2,odd3,odd4,odd5) VALUES('$odd1','$odd2','$odd3','$odd4','$odd5')";
$db->query($sql);
array_push($errors, "Odds added");
}



//add admin
if (isset($_POST['reg_admin'])) {
  // receive all input values from the form
  $username = ($_POST['username']);
  $email = ($_POST['email']);
  $country = $_POST['country'];
  $password_1 = ($_POST['password_1']);
  $password_2 =($_POST['password_2']);
   // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
 
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM admin WHERE username='$username' OR email='$email' LIMIT 1 ";
  $result = $db->query($user_check_query);
  $user=$result->fetch(PDO::FETCH_OBJ);
  
  if ($user) { // if user exists
    if ($user->username == $username) {
      array_push($errors, "Username already exists");
    }

    if ($user->email == $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register admin if there are no errors in the form
  if (count($errors) == 0) {
  	$password = password_hash($password_1,PASSWORD_DEFAULT,array('cost' => 9));//encrypt the password before saving in the database
     
  	$query = "INSERT INTO admin (username, email, password,country) 
  			  VALUES('$username', '$email', '$password','$country')";
  	$db->query($query);
  	array_push($errors, "Admin added succesfully");
  }

}

