<html>
    <head>
    <title>ticket odds</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="refresh" content="5">
    </head>
    <body>
<h1 align="middle">TICKETS</h1>
<?php
 require 'config.php';
 $fg=$_SESSION['username'];
 $sql="UPDATE users SET ticket='Your ticket is being processed' WHERE username='$fg' ";
 $db->query($sql);
 $query3 = "SELECT * FROM users WHERE username='$fg' ";
$results=$db->query($query3) or die($db->error);
if($results->rowCount() > 0){
if($results=$db->query($query3) or die($db->error)){
while($row=$results->fetch(PDO::FETCH_OBJ)){
?>

<h3><font color="red"><?php echo $row->ticket; ?></font></h3>
<?php
if(($row->ticket) == "1"){ 
$query2 = "SELECT * FROM odds WHERE date='today' ";
$db->query($query2);
if($result->rowCount() > 0){
    if($result=$db->query($query2) or die($db->error)){
    while($roww=$result->fetch(PDO::FETCH_OBJ)){
?>
<div class="tips">
<div class="odds">
<?php echo $roww->odds; ?>
</div>
</div>
<?php
    }}}
?>

<?php
}
}}}
?>
</body>
</html>