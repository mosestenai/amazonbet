<?php
session_start(); 
if (isset($_SESSION['username']) != 'main admin') {
  echo 'Unauthorised page';
  }
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
	  <th>COUNTRY</th>
  </tr>
  <?php
  require 'config.php';
  $query="SELECT * FROM users ";
$results= $db->query($query) or die($db->error);
if($results->rowCount() > 0){
if($results= $db->query($query) or die($db->error)){
while($row=$results->fetch(PDO::FETCH_OBJ)){

?>
<tr class="trr">
  <td><?php echo $row->username;?></td>
  <td><?php echo $row->email;?></td>
  <td><?php echo $row->country;?></td>
   </tr>
   
   <?php

}
}
}
?>