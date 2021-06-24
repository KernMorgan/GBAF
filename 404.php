<?php
session_start();
require("include/connectbdd.php");
?>
<head>
    <!DOCTYPE html>
    <meta charset="utf-8" />
    <title>main</title>
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
      <p>Cette page n'existe pas.</p>
      <a href="index.php"> Connectez-vous pour accéder à notre site </a>';
    </div>
  </div>
     <?php
        include 'include/footer.php'; 
      ?>   
</body>
</html>

