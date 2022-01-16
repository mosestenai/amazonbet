<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PayPal  - Success</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
require 'config.php';
$token= $_GET['token'];
if($token != 'keypass'){
    echo "access denied";
}else{
    date_default_timezone_set("Africa/Nairobi");
    $time = date("h:i:sa");
   $date= date("d/m/Y");
$d1= $_GET['d1'];
$d2= $_GET['d2'];
$d3= $_GET['d3'];
$d4= $_GET['d4'];
$d5= $_GET['d5'];
$d6 = $_GET['d6'];
$d7 = $_GET['d7'];

$sql1= "SELECT * FROM payments WHERE transaction_id='$d1'";

$results = $db->query($sql1);
	
  	if ($results->rowCount() > 0) {
header('location: login.php');
      }else{
       
$sql="INSERT INTO payments (transaction_id, payment_status, invoice_id, createdtime,payer_name,payer_email,payer_country,payment_amount) VALUES('$d1','$d2','$d3','$d4', '$d5','$d6','$d7','45')";

$query2 = "SELECT * FROM users WHERE email='$d6'";//check if user already has an expire time
	$results2 = $db->query($query2);
  	if ($results2->rowCount() == 1) {
	$user=$results2->fetch(PDO::FETCH_OBJ);
    $time=$user->expire;
   if($time == 0){
    $expires = date("U") + 604800;
   }else{
       $expires= $time + 604800;
   }
$query= "UPDATE users SET expire='$expires' WHERE email='$d6'";
$db->query($query);
$db->query($sql);
session_destroy();
      }
      }
?>
<br><br><br><br>
<div class="tips">
<p align="middle">
<img src ="images/tick.png" width="330" height="400"><br>
Payment successfull <php echo $d5; ?>
<br><br>
	
    press the button below to login and get your odds<br>
    <a href="login.php"><button class="btn" type="submit">PROCEED</button></a>
    </p>
    </div>
<?php
}
?>
</body>
</html>