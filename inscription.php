<?php
  session_start();
  require("include/connectbdd.php");
?>
<head>
  <!DOCTYPE html>
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
    <?php //affiche une erreur si pseudo déjà utlisé 
      if(!empty($_GET['err']) && $_GET['err']== "pseudo")
      {
        echo '<p style="text-align: center; color: rgb(252, 116, 106);"><strong> Pseudo déjà utilisé ! </strong></p>'; 
      }
      // affiche une validation si tous les champs ne sont pas remplis 
      if(!empty($_GET['err']) && $_GET['err']== "champs")
      {
        echo '<p style="text-align: center; color: rgb(252, 116, 106);"><strong> Veuillez remplir tous les champs. </strong></p>';  
      }
    ?>  
    <div class= "start">
      <p>Bienvenue! Veuillez vous inscrire pour accéder à notre contenu</p>
      <form action="inscription_bdd.php" method="post">
        <p>
          <input type="text" name="name" placeholder="Nom"/>
          <br>
          <input type="text" name="surname" placeholder="Prénom"/>
          <br>
          <input type="text" name="username" placeholder=" Nom d'utilisateur"/>
          <br>
          <input type="password" class= "password" name="password" placeholder="Mot de passe"/>
          <br>
          <input type="text" name="question" placeholder="Question secrète"/>
          <br>
          <input type="text" name="questionanswer" placeholder="Réponse"/>
          <br>
          <input type="submit" name="valider" value="Valider" />
        </p>
      </form>
    </div>
    </div>
    <?php 
     include 'include/footer.php'; 
    ?> 
</body>


