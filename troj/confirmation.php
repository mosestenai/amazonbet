<?php
header("Content-Type:application/json");
if(!isset($_GET["token"])){
echo "Technical error";
exit();
}
if ($_GET["token"]!='Mk087308'){
echo "invalid authorisation";
exit();
}
if (!$request=file_get_contents('php://input')){
echo "invalid input";
exit();}
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
$request= file_get_contents('php://input');
$array = json_decode($request,true);
$transid = $array['TransID'];
$transactiontype = $array['TransactionType'];

$transtime = $array['TransTime'];
$transamount = $array['TransAmount'];
$businessshortcode = $array['BusinessShortCode'];
$billrefno = $array['BillRefNumber'];
$invoiceno = $array['InvoiceNumber'];
$msisdn = $array['MSISDN'];
$orgaccountbalance = $array['OrgAccountBalance'];
$firstname = $array['FirstName'];
$middlename = $array['MiddleName'];
$lastname = $array['LastName'];

$sql="INSERT INTO mpesa_payments
( TransactionType,TransID,TransTime,TransAmount,BusinessShortCode,BillRefNumber,InvoiceNumber,MSISDN,
FirstName,MiddleName,LastName,OrgAccountBalance)  VALUES  ( '$transactiontype', '$transid', '$transtime', '$transamount', '$businessshortcode', 
'$billrefno', '$invoiceno', '$msisdn','$firstname', '$middlename', '$lastname', '$orgaccountbalance' )";

$db->query($sql) or die($db->error);
echo 
  '{"ResultCode":0,"ResultDesc":"Confirmation received successfully"}';
exit();
?>