<?php
session_start();
require("include/connectbdd.php");
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
        if(isset($_SESSION['id']) && !empty($_SESSION['id']))
        {
          $id = $_SESSION['id'];
          $recup =  $bdd->prepare('SELECT * FROM users WHERE id = ?');
          $recup->execute(array($id));
          if($recup->rowCount() == 1)
          {
            $profilinfo = $recup->fetch();
            $name = $profilinfo['name'];  
            $surname = $profilinfo['surname'];
            $username = $profilinfo['username'];
            $password = $profilinfo['password'];
            $question = $profilinfo['question'];
            $questionanswer = $profilinfo['questionanswer'];
          }
        }
        else 
        {
          header('Location: index.php');
        }
        
        if(isset($_POST['submit']) )
        {
          if(!empty($_POST['name']) AND !empty($_POST['surname']) AND !empty($_POST['username']) AND !empty($_POST['question']) AND !empty($_POST['questionanswer']))
          { 
            $id = $_SESSION['id'];
            $nom = $_POST['name'];
            $prenom = $_POST['surname'];
            $surnom = $_POST['username'];
            $mdp = $password;
            $interrogation = $_POST['question'];
            $reponse = $_POST['questionanswer'];
            $modifyprof = $bdd->prepare("UPDATE users SET name = :name, surname = :surname, username = :username, password = :password, question = :question, questionanswer = :questionanswer WHERE id = :id");
            $modifyprof->execute(array(
            'id' => $id,
            'name' => $nom,
            'surname' => $prenom,
            'username' => $surnom,
            'password' => $mdp,
            'question' => $interrogation,
            'questionanswer' => $reponse,
            ));
            echo '<p style="color: green;"> Votre profil a bien été modifié !</p>';
            header("Refresh:1.1; url=profile.php");
          }
          else 
          {
           echo '<p style="color: red;"> Veuillez remplir tout les champs !</p>';
          }
        }      
      ?>        
      <form class="form" action="profile.php" method="post">
        <p>Nom:<br> 
        <input type="text" name="name" value="<?php echo $name;?>" />
        <br>Prénom:<br>
        <input type="text" name="surname" value="<?php echo $surname;?>" />
        <br>Nom d'utilisateur:<br>
        <input type="text" name="username" value="<?php echo $username;?>" />
        <br>Question secrète:<br>
        <input type="text" name="question" value="<?php echo $question;?>"/ />
        <br>Réponse:<br>
        <input type="text" name="questionanswer" value="<?php echo $questionanswer;?>"/ />
        <br>
        <input type="submit" name = "submit" value="Valider" />
        <br>
        <a href="main.php">Retournez à l'accueil</a></p>
        </p>
      </form>
    </div>
  </div>
    <div class="footer-diconnected">
      <?php
        include 'include/footer.php'; 
      ?>   
    </div>
</body>
