<?php
session_start(); 
if (isset($_SESSION['username']) != 'main admin') {
  echo 'Unauthorised page';
  }else{
?>
 <!DOCTYPE html>
    <html>
    <head>
    <title>oddsaccount</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
<table>
  <tr class="tr">
      <th>NAME</th>
	  <th>EMAIL ADDRESS</th>
	  <th>COUNTRY CODE</th>
	  <th>PAYMENT STATUS</th>
	  <th>AMOUNT</th>
      <th>INVOICE ID</th>
      <th>TRANSACTION ID</th>
  </tr>
  <?php
  require 'config.php';
  $query="SELECT * FROM payments ";
$results= $db->query($query) or die($db->error);
if($results->rowCount() > 0){
if($results= $db->query($query) or die($db->error)){
while($row=$results->fetch(PDO::FETCH_OBJ)){

?>
<tr class="trr">
  <td><?php echo $row->payer_name;?></td>
  <td><?php echo $row->payer_email;?></td>
  <td><?php echo $row->payer_country;?></td>
  <td><?php echo $row->payment_status;?></td>
  <td><?php echo $row->payment_amount;?></td>
  <td><?php echo $row->invoice_id;?></td>
  <td><?php echo $row->transaction_id;?></td>
  </td>
   </tr>
   
   <?php

}
}
}
  }
?>