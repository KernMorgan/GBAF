<?php
session_start();
require("include/connectbdd.php");
?>
<head>
    <!DOCTYPE html>
    <meta charset="utf-8" />
    <title>acteur</title>
   	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
</head>
<body>
  <div class= "container">
    <?php 
      include 'include/header.php'; 
    ?>
    <div class= "main">
<?php
$reponse = $bdd->query('SELECT * FROM partenaires');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
    <p>
   
    <img src="<?php echo $donnees['logo']; ?>" /><br />
<?php echo $donnees['description']; ?><br />
   </p>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
    <?php 
      include 'include/footer.php'; 
    ?>   
  </div>
</body>
