<?php
  // connexion à la bdd
  require("include/connectbdd.php");
  // vérification des données
  if (isset($_POST['valider'])) 
  {
	$nom = htmlspecialchars($_POST['name']);
	$prenom = htmlspecialchars($_POST['surname']) ;
	$username = htmlspecialchars($_POST['username']);
	$pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$question = ($_POST['question']);
	$reponse = htmlspecialchars($_POST['questionanswer']);	
	if (!empty($_POST['name']) AND !empty($_POST['surname']) AND !empty($_POST['username']) AND !empty($_POST['password']) AND !empty($_POST['question'] AND !empty($_POST['questionanswer'])))
	{		
	  //pseudo libre ? 
	  $requsername = $bdd->prepare("SELECT id FROM users WHERE username = ?");
	  $requsername->execute(array($username));
	  $usernameexist = $requsername->rowcount();
	  if ($usernameexist == 0) 
      {
		// insérer dans la base de données 
		$req = $bdd->prepare('INSERT INTO users(name, surname, username, password, question, questionanswer) VALUES(?, ?, ?, ?, ?, ?)');
	    $req->execute(array($nom, $prenom, $username,$pass_hache, $question, $reponse));
		// Puis redirection du visiteur vers la page de connexion
		header('Location: index.php'); 
	  }        
	  else 
      {
        header('location: inscription.php?err=pseudo');
      }
	}
    else
    {
	  header('location: inscription.php?err=champs');
	}
  }
S?>