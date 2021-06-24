<?php
session_start();
require("include/connectbdd.php");
    //  Récupération de l'utilisateur et de son password
  $req = $bdd->prepare('SELECT id, name, surname, password FROM users WHERE username = ?');
  $req->execute(array($_POST['username']));
  $resultat = $req->fetch();

  if (!empty($_POST['username']) AND !empty($_POST['password'])) 
  {
    $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);
    if (!$isPasswordCorrect) 
    {
      $message = 'Mot de passe incorrect.';
      echo "<SCRIPT> //not showing me this
      alert('$message')
      window.location.replace('index.php?err=password');
      </SCRIPT>";
    }
    else 
    {
      $_SESSION['id'] = $resultat['id'];
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['name']= $resultat['name'];
      $_SESSION['surname']= $resultat['surname'];
      header('Location: main.php');
    }
  }
  else
  {
    header('Location: index.php?err=champs');
  }        
?>
