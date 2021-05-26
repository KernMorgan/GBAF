<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>GBAF</title>
    <link rel=“stylesheet” href=“style.css”>
</head>
<body>
<p>Bonjour <?php echo $_POST['username'];?> !</p>
<br> 
<a href="profile.php">Modifier mon profil;</a></p><a href="deconnexion.php">Se déconnecter</a></p>
    <h1>GBAF</h1>
    <p>Le Groupement Banque Assurance Français (GBAF) est une fédération représentant les 6 grands groupes français :</p>
    <ul>BNP Paribas ;</ul>
    <ul>BPCE ;</ul>
    <ul>Crédit Agricole ;</ul>
    <ul>Crédit Mutuel-CIC ;</ul>
    <ul>Société Générale ;</ul>
    <ul>La Banque Postale.</ul>
    <br>
    <p>Même s’il existe une forte concurrence entre ces entités, elles vont toutes travailler de la même façon pour gérer près de 80 millions de comptes sur le territoire national.
    <br>
    Le GBAF est le représentant de la profession bancaire et des assureurs sur tous   les axes de la réglementation financière française. 
    <br>
    Sa mission est de promouvoir l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des
    pouvoirs publics</p>
</body>

