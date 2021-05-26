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
    <h1>GBAF</h1>
    <p>Première visite? <a href="inscription.php">Cliquez ici</a></p>
    <form action="main.php" method="post">
        <p>Nom d'utilisateur
            <input type="text" name="username" />
            <br>
            Mot de passe
            <input type="password" name="password" />
            <br>
            <input type="submit" value="Valider" />
        </p>
    </form>
    <p> Vous avez oublié votre mot de passe? <a href="passwordchange.php">Cliquez ici</a></p>
</body>

</html>