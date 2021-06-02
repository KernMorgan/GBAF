<?php
session_start();
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
    <div class= "start">
    <p>Bienvenue! Veuillez vous inscrire pour accéder à notre contenu</p>
    <form action="profile.php" method="post">
        <p>
            <input type="text" name="nom" placeholder="Nom"/>
            <br>
            <input type="text" name="prenom" placeholder="Prénom"/>
            <br>
            <input type="text" name="username" placeholder=" Nom d'utilisateur"/>
            <br>
            <input type="password" name="password" placeholder="Mot de passe"/>
            <br>
            <input type="text" name="question" placeholder="Question secrète"/>
            <br>
            <input type="text" name="questionanswer" placeholder="Réponse"/>
            <br>
            <input type="submit" value="Valider" />
        </p>
    </form>
</div>
  <?php 
         include 'include/footer.php'; 
    ?> 
</div>
</body>

