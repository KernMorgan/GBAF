<?php
session_start();
?>
<head>
    <!DOCTYPE html>
    <meta charset="utf-8" />
    <title>GBAF</title>
   	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container">
    <?php 
      include 'include/header1.php'; 
    ?>
    <div class="start">
      <p>Première visite? <a href="inscription.php">Cliquez ici</a></p>
      <form action="main.php" method="post">
        <p>
        <input type="text" name="username" placeholder="Nom d'utilisateur"/>
        <br>
        <input type="password" name="password" placeholder="Mot de passe" />
        <br>
        <input type="submit" value="Valider" />
        </p>
      </form>
      <p> Vous avez oublié votre mot de passe? <a href="passwordchange.php">Cliquez ici</a></p>
    </div>
    <?php 
     include 'include/footer.php'; 
    ?> 
  </div>
</body>




