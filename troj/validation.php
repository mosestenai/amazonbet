<?php
header("Content-Type:application/json");
if(!isset($_GET["token"])){
echo "Technical error";
exit();
}
if ($_GET["token"]!='Mk087308'){
echo "invalid authorisation";
exit();
}else{
echo '{"ResultCode":0,
       "ResultDesc":"Success",
"ThirdPartyTransID":0};'}

?>