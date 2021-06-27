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
      <p>Nom d'utilisateur</p>
      <form action="passwordquestion.php" method="post">
        <input type="text" name="username" />
        <br>
        <input type="submit" value="Valider" />
      </form>
    </div>
    </div>
    <div class="footer-diconnected">
      <?php
        include 'include/footer.php'; 
      ?>   
    </div>
 
</body>

    