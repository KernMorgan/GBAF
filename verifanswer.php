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
  <?php
    if (isset($_POST['questionanswer']) AND !empty($_POST['questionanswer']) AND isset($_POST['username']) AND !empty($_POST['username']))    
    {     
      $username = $_POST["username"];
      $req_quest = $bdd->prepare('SELECT * FROM users WHERE username = :username ');
      $req_quest-> execute(array(
      'username' => $username));
      $resultat = $req_quest->fetch();
      
      $isAnswerCorrect = (($_POST['questionanswer'] == $resultat['questionanswer']));
      if (!$isAnswerCorrect) 
      { 
        $erreur = '<p style="color: red;"> Réponse incorrecte! Veuillez réessayer</p>';
        echo $erreur;
      }
      else 
      {
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['username'] = $_resultat['username'];
        $_SESSION['name']= $resultat['name'];
        $_SESSION['surname']= $resultat['surname'];
        header('Location: main.php');
      }
    }     
  ?>
</body>