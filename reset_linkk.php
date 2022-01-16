<?php error_reporting (E_ALL  ^ E_NOTICE && E_WARNING);?>
<?php
require 'config.php';//including database connection file
  
//checking if the submit button in the create new password file was clicked
if (isset($_POST["reset-linkk-submit"])){
  $selector = $_POST["selector"];
  $validator = $_POST["validator"];
  $password = $_POST["pwd"];
  $passwordRepeat = $_POST["pwd-repeat"];
  
  if (empty($password) || empty($passwordRepeat)) {
    array_push($errors, "Password field is empty");
	  
  }elseif($password != $passwordRepeat){
    array_push($errors, "The two passwords do not match");
  }
  if (count($errors) == 0) {
  //checking if token has expired
  $currentDate = date("U");
  
  
  //sql statement to select the actual token
   $sql2 = "SELECT * FROM pwdReset WHERE pwdResetSelector='$selector' AND pwdResetExpires >= '$currentDate'";
    $result = $db->query($sql2);
    if($result->rowCount() > 0){
      if($result=$db->query($sql2) or die($db->error)){
         //fetch row that contains the token and stores inside associative array
        while($row=$result->fetch(PDO::FETCH_OBJ)){
    //convert validator token from hexadecimal to binary
  $tokenBin = hex2bin($validator);
	
	if (password_verify($tokenBin, $row->pwdResetToken) == 0){
	array_push($errors, "Invalid access token");
	}// uodate the user credentials
	elseif(password_verify($tokenBin, $row->pwdResetToken) == 1){
	
	$tokenEmail = $row->pwdResetEmail;
	$sql = "SELECT * FROM hostels WHERE email='$tokenEmail'";
    $result2=$db->query($sql);
	
	  
	  if ($result2->rowCount() == 0) {
	 array_push($errors, "There was an error");
	 
	  }else{
	  $po=$_SESSION['campus'];
	 
	  //encrypting the password that wa reset by the user
     $newPwdHash = password_hash($password, PASSWORD_DEFAULT,array('cost' => 9));
     $query7 = "UPDATE hostels SET password='$newPwdHash' WHERE email='$tokenEmail'";
	   $db->query($query7);
	   
	   
	   $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";//sql to delete any existing token
       $stmt = $db->prepare($sql);//prepare statement
      
       $stmt->execute([$tokenEmail]);//replacing the question mark in sql before executing the statement
	   header("Location: login.php?newpwd=passwordupdated");
       }
	  }
	}
  }
}
else{
	array_push($errors, "Your link has expired.You need re-submit your reset request");
}
}
   }
  ?>