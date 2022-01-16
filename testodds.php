<?php error_reporting (E_ALL ^ E_NOTICE);?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users Account</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1 align="middle">Today's odds</h1>
<?php 
session_start(); 
if (!isset($_SESSION['username'])) {
    header('location: login.php?message=login first in order to buy a ticket.');
}
require 'config.php';
$fg = $_SESSION['username'];
$query3 = "SELECT * FROM users WHERE username='$fg'";
$results=$db->query($query3) or die($db->error);
if($results->rowCount() > 0){
if($results=$db->query($query3) or die($db->error)){
while($row=$results->fetch(PDO::FETCH_OBJ)){
   $expire = $row->expire;
   $today = date("U");

    if($expire > $today)  {
        $query5 = "SELECT * FROM odds";
        $results3=$db->query($query5) or die($db->error);
        if($results3->rowCount() > 0){
        if($results3=$db->query($query5) or die($db->error)){
        while($rowww=$results3->fetch(PDO::FETCH_OBJ)){
?>

<div class="tips">
<p align="middle">
<?php echo $rowww->odd1 ?><br>
<?php echo $rowww->odd2 ?><br>
<?php echo $rowww->odd3 ?><br>
<?php echo $rowww->odd4 ?><br>
<?php echo $rowww->odd5 ?><br><br>
=============================
        </p>
</div>

        <?php
        }}}
    }else{
        echo "Your dont have any open ticket,choose any payment to buy a weekly ticket";
    }

}}}
?>
<div class="allodds">
<br><h3 align="middle">Pay for odds with paypal</h3>

    <div id="paypal-payment-button"></div>
    <br>
</div>
    <script src="https://www.paypal.com/sdk/js?client-id=AYfcwezpCk_CrOva1xPQje0mMlT8BuoaJS3a6zyJQm09yX1Y8bCJUj5T0eHabo-gqb89bk19xAOQBDlv&disable-funding=credit,card">

</script>
<script src="index.js">
  
    // This function displays Smart Payment Buttons on your web page.
  </script>
  
</body>

</html>