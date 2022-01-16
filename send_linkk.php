<?php error_reporting (E_ALL  ^ E_NOTICE && E_WARNING);?>
<?php

if (isset($_POST["submit_email"])){

 $selector = bin2hex(random_bytes(8));	
 $token = random_bytes(32);
$po = $_SESSION['campus'];
//link to the reset password page and token
 $url = "https://www.eazistey.co.ke/create-new-password.php?selector=" . $selector ."&validator=" . bin2hex($token) . '&campus='.$po;
//time at which the token expires
$expires = date("U") + 1800;
//including a file that contains database connection
 require 'config.php';
 
 
 //fetching the submitted email
 $userEmail = $_POST["email"];
   if (empty($userEmail)) {
  	array_push($errors, "Email field is empty");
  }
if (count($errors) == 0) {

 $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";//sql to delete any existing token
 $stmt=$db->prepare($sql);//prepare statement
 $stmt->execute([$userEmail]);//replacing the question mark with the email submitted
 $stmt = null;

 $sql = "INSERT INTO pwdReset(pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?,
 ?)";
 $stmt = $db->prepare($sql);//prepare statement
 $hashedToken = password_hash($token, PASSWORD_DEFAULT,array('cost' => 9));//encrypting the token using default hashing method
 $stmt->execute([$userEmail, $selector, $hashedToken, $expires]);//replacing the four question marks with the values here
 
 $stmt = null;
 
 
 //sending email


 require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
//require("sendgrid/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases
$API_KEY = "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";
$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("amazonbet@gmail.com","amazonbet.com");
$email->setSubject("Reset your password");
$email->addTo($userEmail,$userEmail);
$email->addContent("text/plain", "Amazonbet reset password email");
$email->addContent(
    "text/html", "<p>We received a password reset request.The link to reset you password is below,if you did not make
    this request, you can ignore this email</p><br>
    <font color='red'>*Note</font> the link expires after 30 minutes since the reset password request was made
    <p>Here is your password reset link: <br>
    <a href= $url > $url  </a></p>"
);

$sendgrid = new \SendGrid($API_KEY);

if($sendgrid->send($email)){
    header("Location: reset pass.php?reset=success");//success message to be displayed in the reset password page
}

}
}
?>