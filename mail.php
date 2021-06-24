<?php
session_start();
require("include/connectbdd.php");
require("./PHPMailer/src/PHPMailer.php");
require("./PHPMailer/src/SMTP.php");
require("./PHPMailer/src/Exception.php");
?>
<head>
  <!DOCTYPE html>
  <meta charset="utf-8" />
  <title>profile</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
</head>
<body>
   <div class= "container">
    <?php 
      include 'include/header.php';
	  ?>  
    <div class="start"> 
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
  
require_once "vendor/autoload.php";
  
$mail = new PHPMailer(true);
  
try {
    $mail->isSMTP();
    $mail->Host = 'in-v3.mailjet.com'; // host
    $mail->SMTPAuth = true;
    $mail->Username = 'fa028e868ad37f1f956efe012f839aee'; //username
    $mail->Password = '8bd0e13c11d6c661a7ce26ebfd6b8c0a'; //password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587; //smtp port
    
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('kernnmaheo@gmail.com', 'GBAF');
  
    $mail->isHTML(true);
    $mail->Subject = 'GBAF';
    $mail->Body    = $_POST['message'];;
  
    $mail->send();
    echo 'Le message a bien été envoyé.';
} catch (Exception $e) {
    echo 'Erreur: '. $mail->ErrorInfo;
}
?>
<br>
 <a href="main.php">Retournez à l'accueil</a></p>
</div>
  <?php 
    include 'include/footer.php'; 
  ?> 
</body>
