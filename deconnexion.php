<?php 
  session_start();
  $_SESSION = array();
  session_destroy();
?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8" />
  <title>déconnection</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
  <meta http-equiv="refresh" content="3; URL=index.php" />
</head>
<body>
  <div class= "container">
    <?php 
      include 'include/header1.php'; 
    ?>
    <div class="start">
      <p>Vous êtes déconnecté.</p>
      <a href="index.php"> Connectez-vous pour accéder à notre site </a>
    </div>
  </div>
  <div class="footer-diconnected">
    <?php
      include 'include/footer.php'; 
    ?>   
  </div>
</body>