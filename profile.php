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
 <form action="profile.php" method="post">
        <p>Nom
            <input type="text" name="nom" value=" <?php echo $_POST['nom'];?>" />
            <br>
            Prénom
            <input type="text" name="prenom" value=" <?php echo $_POST['prenom'];?>" />
            <br>
            Nom d'utilisateur
            <input type="text" name="username" value=" <?php echo $_POST['username'];?>" />
            <br>
            Mot de passe
            <input type="password" name="password" value=" <?php echo $_POST['password'];?>"/>
            <br>
            Question secrète
            <input type="text" name="question" value=" <?php echo $_POST['question'];?>"/ />
            <br>
            Réponse á votre question secrète
            <input type="text" name="questionanswer" value=" <?php echo $_POST['questionanswer'];?>"/ />
            <br>
            <input type="submit" value="Valider" /><a href="index.php">Retournez à l'index</a></p>
        </p>
    </form>
</body>

$reponse = $bdd->query('Tapez votre requête SQL ici');



<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>

