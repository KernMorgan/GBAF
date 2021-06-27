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
  <script src="https://kit.fontawesome.com/09241b8251.js" crossorigin="anonymous"></script>
  <script src="https://use.fontawesome.com/fe459689b4.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <div class= "container">
    <div class="content-wrap">
      <?php 
        include 'include/header.php';  
        if (isset($_SESSION['id']) && !empty($_SESSION['id']))
        {     
      ?>
          <div class= "main main-acteurs">
            <?php
            //on récupère les info du partenaire selon son ID
              if(isset($_GET['id']) && !empty($_GET['id']))
              {
                $id = $_GET['id'];
                $req = $bdd->prepare('SELECT * FROM partenaires WHERE id = ?');
                $req->execute(array($id));
                if($req->rowCount() == 1)
                {
                  $donnees = $req->fetch();
                  $titre = $donnees['name'];  
                  $contenu = $donnees['description'];
                  $image = $donnees['logo'];
                }
              }
              else 
              {
                echo " Cette page n'existe pas";
                exit;
              }
            ?>
            <div class="logo-block">
              <img class="logo-acteur" src="<?php echo $donnees['logo']; ?>" alt="logo_acteur"/>
              <br/>
            </div> 
            <div class="description_acteur">
              <?php 
                echo '<h2>' . $donnees['name'] . '</h2>';
                echo '<p>' . $donnees['description'] . '</p>';
              ?> 
            </div>
          </div>
          <div class="commentaire-block">
            <div class="commentaire-top">
              <?php 
              //on compte les commentaires
                if(isset($_GET['id']) && !empty($_GET['id']))
                {
                  $nbr_comm = $bdd->prepare('SELECT COUNT(id) as countcomment FROM reviews WHERE partenaire_id = :id');
                  $nbr_comm -> execute(array('id' => $id));
                  while( $result = $nbr_comm->fetch())
                  {
                    echo  '<h3>' . $result['countcomment'] .  ' commentaire(s)</h3>';
                  }
                }
                //condition clique positif ou negatif
                if(isset($_POST['positif']))
                { 
                  $user_id = $_SESSION['id'];
                  $id_acteur = $_GET['id'];

                  $req_posi = $bdd->prepare('SELECT positif FROM vote WHERE user_id = :user_id AND partenaire_id = :partenaire_id');
                  $req_posi-> execute(array(
                  'user_id' => $user_id,
                  'partenaire_id' => $id_acteur));

                  $posi_exist = $req_posi->rowcount();

                  if ($posi_exist == 0)  
                  {
                    $addlike = $bdd->prepare('INSERT INTO vote (positif, partenaire_id, user_id) VALUES (1,:partenaire_id,:user_id)');
                    $addlike->execute(array(
                    'partenaire_id' => $id,
                    "user_id" => $_SESSION["id"]));
                  }
                  else
                  {
                    echo '<p style="color: rgb(252, 116, 106);"> Vous ne pouvez voter qu\'une seule fois!</p>';
                  }
                }
                elseif (isset($_POST['negatif']))
                {          
                  $user_id = $_SESSION['id'];
                  $id_acteur = $_GET['id'];

                  $req_nega  = $bdd->prepare('SELECT negatif FROM vote WHERE user_id = :user_id AND partenaire_id = :partenaire_id');
                  $req_nega-> execute(array(
                  'user_id' => $user_id,
                  'partenaire_id' => $id_acteur));

                  $nega_exist = $req_nega->rowcount();

                  if ($nega_exist == 0)  
                  {
                    $dislike = $bdd->prepare('INSERT INTO vote (negatif, partenaire_id, user_id) VALUES (1,:partenaire_id,:user_id)');
                    $dislike->execute(array(
                    'partenaire_id' => $id,
                    "user_id" => $_SESSION["id"]));
                  }
                  else
                  {
                    echo '<p style="color: rgb(252, 116, 106);"> Vous ne pouvez voter qu\'une seule fois!</p>';
                  }
                }
              ?>
              <div class="commentaire">
                  <form class="form-commentaire" action="commentpost.php?id=<?php echo $_GET['id']; ?>"" method="POST">
                  <textarea name="content" ></textarea>
                  <input type="submit" name="submit" value="Envoyer">
                  <input class="input" type="hidden" name="surname" value="<?php echo $_SESSION['surname']?>" /> 
                  <input type="hidden" name="partenaire_id" id = "partenaire_id" value="<?php echo $_GET['id'];?>" />
                  <input type="hidden" name="user_id" id = "user_id" value="<?php echo $_SESSION['id']; ?>" />
                </form>
                <form action="acteurs.php?id=<?php echo $_GET['id']; ?>"" method="POST">
                  <?php 
                  //décompte des likes
                    if(isset($_GET['id']) && !empty($_GET['id']))
                    {
                      $pos_comm = $bdd->prepare('SELECT sum(positif) as countpositif FROM vote WHERE partenaire_id = :id');
                      $pos_comm -> execute(array('id' => $id));
                      $positif= $pos_comm->fetch();
                      echo  $positif ['countpositif'];
                    }
                  ?>
                  <button class="btn" name="positif" ><i class="fa fa-thumbs-up fa-lg" value="positif" aria-hidden="true"></i></button>
                  <?php
                  //décompte des dislikes
                    if(isset($_GET['id']) && !empty($_GET['id']))
                    {
                      $neg_comm = $bdd->prepare('SELECT sum(negatif) as countnegatif FROM vote WHERE partenaire_id = :id');
                      $neg_comm -> execute(array('id' => $id));
                      $negatif= $neg_comm->fetch();
                      echo  $negatif ['countnegatif'];
                    }
                  ?> 
                  <button class="btn" name="negatif"><i class="fa fa-thumbs-down fa-lg" value = "negatif" aria-hidden="true"></i></button>
                </form>
              </div>
            </div>
            <?php
            //boucle d'affichage des commentaires
              $req->closeCursor();
              $req = $bdd->prepare('SELECT reviews.id, reviews.user_id, users.surname, reviews.content, 
              DATE_FORMAT(date, \'%d/%m/%Y \') AS date_comment
              FROM reviews INNER JOIN users ON reviews.user_id = users.id
              WHERE partenaire_id = ? ORDER BY date DESC');
              $req->execute(array(
              $_GET['id']));     
              while ($resultat = $req->fetch())
              {
            ?>
            <div class="affichage-comm"> 
              <?php
                echo $resultat['surname']."</br> ". $resultat['date_comment']."</br> ".$resultat['content'];
              ?>
          </div>
        </div>
      <?php 
          }
          $req->closeCursor();  
        }
        else 
        {
          header('Location: 404.php');
        }
        include 'include/footer.php'; 
      ?>  
    </div>
  </div>
</body>
