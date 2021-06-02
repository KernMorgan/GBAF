<?php
session_destroy();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>déconnection</title>
   	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
</head>
<body>
   <div class= "container">
      <?php 
        include 'include/header1.php'; 
      ?>
     <div class="start">
   <p>Vous êtes déconnecté.</p>
   <p>À Bientôt</p>
</div>
    <?php 
      include 'include/footer.php'; 
    ?>   
  </div>
</div>
</body>