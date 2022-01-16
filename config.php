<?php error_reporting (E_ALL ^ E_NOTICE);?><?php

session_start();
// initializing variables
$username = "";
$email    = "";
$errors = array(); 
$minpassword = 7;
$host="ec2-52-71-161-140.compute-1.amazonaws.com";
$user="glgofglsnqmphi";
$password="129a4844cea6870ce86ab2b9aabb5ad9cc03045726f5ce9beee146219c441f93";
$dbname="dd8so82sd2ei0b";
$port="5432";
 
try{
$db = new PDO("pgsql:host=$host;dbname=$dbname;port=$port",$user,$password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $error)
{
$error->getMessage();
}

?>