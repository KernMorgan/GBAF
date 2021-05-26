<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>GBAF</title>
    <link rel=“stylesheet” href=“style.css”>
</head>

<body>
    <h1>GBAF</h1>
    <p>Bienvenue! Veuillez vous inscrire pour accéder à notre contenu</p>
    <form action="profile.php" method="post">
        <p>Nom
            <input type="text" name="nom" />
            <br>
            Prénom
            <input type="text" name="prenom" />
            <br>
            Nom d'utilisateur
            <input type="text" name="username" />
            <br>
            Mot de passe
            <input type="password" name="password" />
            <br>
            Question secrète
            <input type="text" name="question" />
            <br>
            Réponse á votre question secrète
            <input type="text" name="questionanswer" />
            <br>
            <input type="submit" value="Valider" />
        </p>
    </form>
</body>

