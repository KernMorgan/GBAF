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
    <?php
      if (isset($_POST['username']) AND !empty($_POST['username'])) 
      { 	 
        $username = htmlspecialchars($_POST['username']);
	      $requsername = $bdd->prepare("SELECT id FROM users WHERE username = ?");
	      $requsername->execute(array($username));
	      $usernameexist = $requsername->rowcount();
	      if ($usernameexist == 1) 
        {
          $username = htmlspecialchars($_POST['username']);
          $req_quest = $bdd->prepare('SELECT * FROM users WHERE username = :username ');
          $req_quest-> execute(array(
          'username' => $username));
          $resultat = $req_quest->fetch();
        }
        else
        {
                echo '<p style="color: rgb(252, 116, 106);"><strong>Nom d\'utilisateur introuvable</strong></br>
              <a href="index.php" "> Retour à l\'accueil à notre site </a></p>'; 
         exit;
        }
      }
    else 
    {
      echo '<p style="color: rgb(252, 116, 106);"><strong> Veuillez renseigner votre nom d\'utilisateur </strong></br>
      <a href="index.php" "> Retour à l\'accueil à notre site </a></p>'; 
      exit;
    }
    ?>
      <form action="verifanswer.php" method="post">
        <br>
        <?php
          echo   $resultat['question'] 
        ?>  
        <br>
        <input type="hidden" name="username" value="<?= $username ?>">
        <br>
        <input type="text" name="questionanswer" />
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
</html>

