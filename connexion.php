<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>GBAF</title>
    <link rel=“stylesheet” href=“style.css”>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
</head>

<body>
<div class= "container">
      <?php 
        include 'include/header1.php'; 
      ?>
    <?php
    if (isset($_POST['password']) and $_POST['password'] ==  "kangourou") // Si le mot de passe est bon
    {
        // On affiche les codes
    ?>
        <h1>Voici les codes d'accès :</h1>
        <p><strong>CRD5-GTFT-CK65-JOPM-V29N-24G1-HH28-LLFV</strong></p>

        <p>
            Cette page est réservée au personnel de la NASA. N'oubliez pas de la visiter régulièrement car les codes d'accès sont changés toutes les semaines.<br />
            La NASA vous remercie de votre visite.
        </p>
    <?php
    } else // Sinon, on affiche un message d'erreur
    {
        echo '<p>Mot de passe incorrect</p>';
    }
    ?>


</body>

</html>