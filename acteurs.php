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
      if(isset($_GET['id']) && !empty($_GET['id']))
      {
        // Stocke toute les données de la table acteurs dans $req ou id == $_GET['id']
        $id = $_GET['id'];
        $req = $bdd->prepare('SELECT * FROM partenaires WHERE id = ?');
        $req->execute(array($id));
      }
      if($req->rowCount() == 1)
      {
        $donnees = $req->fetch();
        $titre = $donnees['name'];  
        $contenu = $donnees['description'];
        $image = $donnees['logo'];
        }
      else 
      {
        header('HTTP/1.0 404 Not Found');
        echo " Cette page n'existe pas";
        exit;
      }
      ?>
    <img class="logoacteur" src="<?php echo $donnees['logo']; ?>" alt="logo_acteur"/> <br/><br/>
    <div class="description_acteur">
      <?php 
        echo '<h2>' . $donnees['name'] . '</h2>';
        echo $donnees['description'];
      ?> 
    </div>
  </div>
  <form action="acteur.php" method="POST">
    <p>Commentaire</p><textarea name="message" rows="6" cols="25"></textarea><br />
    <input type="submit" value="Envoyer">
  </form>
  <?php 
        // Compter le nombre de commentaires 
    if(isset($_GET['id']) && !empty($_GET['id']))
    {
      $nbr_comm = $bdd->prepare('SELECT COUNT(id) as countcomment FROM reviews WHERE partenaire_id = :id');
      $nbr_comm -> execute(array('id' => $id));
      while( $result = $nbr_comm->fetch())
      {
        echo  '<h3>' . $result['countcomment'] .  ' commentaire(s)</h3>';
      }
    }
    
    if(isset($_GET['id']) && !empty($_GET['id']))
    {
      $comments = $bdd->prepare('SELECT content FROM reviews WHERE partenaire_id = :id');
      $comments -> execute(array('id' => $id));
      while( $resultat = $comments->fetch())
        echo  '<h3>' . $resultat['content'] .  '</h3>';
    }
  ?> 

  <?php 
    include 'include/footer.php'; 
   ?>   
</body>


