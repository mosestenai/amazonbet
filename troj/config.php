<?php error_reporting (E_ALL ^ E_NOTICE);?><?php

session_start();
// initializing variables
$username = "";
$email    = "";
$errors = array(); 
$minpassword = 7;
$host="ec2-3-231-16-122.compute-1.amazonaws.com";
$user="ncptotqskcmxwy";
$password="5653f4d289be62227e6060caed266093cbef445c615bed3d640d329495d70d7d";
$dbname="dfln88eckenq4v";
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