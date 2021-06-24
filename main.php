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
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <div class= "container">
    <?php 
      include 'include/header.php'; 
      if (isset($_SESSION['id']) && !empty($_SESSION['id']))
      {
        $id = $_SESSION['id'];
        $req = $bdd->prepare('SELECT * FROM partenaires WHERE id = ?');
        $req->execute(array($id));
      }
      else 
      {
        header('Location: index.php');
      }
    ?>
    <div class= "main">
      <h1>GBAF</h1>
      <p>Le Groupement Banque Assurance Français (GBAF) est une fédération représentant les 6 grands groupes français :</p>
        <ul>
        <li>BNP Paribas ;</li>
        <li>BPCE ;</li>
        <li>Crédit Agricole ;</li>
        <li>Crédit Mutuel-CIC ;</li>
        <li>Société Générale ;</li>
        <li>La Banque Postale.</li>
        </ul>
      <p>Même s’il existe une forte concurrence entre ces entités, elles vont toutes travailler de la même façon pour gérer près de 80 millions de comptes sur le territoire national.
      <br>Le GBAF est le représentant de la profession bancaire et des assureurs sur tous   les axes de la réglementation financière française. 
      <br>Sa mission est de promouvoir l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des pouvoirs publics</p>
    </div>
		<div id="partenaire-list">
			<h2> Acteurs et Partenaires </h2>
			<p> Présentation de la liste des différents acteurs du système bancaire français :</p>
      <?php 
        $reponse = $bdd->query('SELECT * FROM partenaires');
        while ($donnees = $reponse->fetch())
      {
        ?>
        <div class="partenaire-card">
          <img class="logo-acteur" src="./<?= $donnees['logo'] ?>">
        <br />
        <div class="partenaire-info">
          <h3 class="partenaire-nom"><?php echo $donnees['name']; ?></h3>
          </br>
          <p class="partenaire-description"> <?php echo mb_strimwidth($donnees['description'],  0, 110, "..."); ?><br /></p>
          <div class="partenaire-lien">
            <a href='acteurs.php?id=<?php echo $donnees['ID']; ?>'><button class= "partenaire-bouton" type="button">Lire la suite</button></a>
          </div>
        </div>
        </div>
        <?php
      }
      $reponse->closeCursor(); //
        include 'include/footer.php'; 
      ?> 
  	</div>
  </div> 
</body>



