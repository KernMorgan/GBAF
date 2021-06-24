<?php
  session_start();
  $title = 'Commentaire';
  require("include/connectbdd.php");
?>
<head>
    <!DOCTYPE html>
    <meta charset="utf-8" />
    <title>main</title>
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
        if(isset($_POST['submit']))    
        {
          $user_id = $_POST['user_id'];
          $id_acteur = $_POST["partenaire_id"];
          $post = $_POST['content'];
          $prenom = $_POST['surname']; 

          $req_comm = $bdd->prepare('SELECT content FROM reviews WHERE user_id = :user_id AND partenaire_id = :partenaire_id');
          $req_comm-> execute(array(
          'user_id' => $user_id,
          'partenaire_id' => $id_acteur));

          $comm_exist = $req_comm->rowcount();
          if ($comm_exist == 0)  
          {
            if(isset($_POST['content']) AND !empty($_POST['content']))
            {
              $addcomm = $bdd->prepare('INSERT INTO reviews(user_id, partenaire_id, date, content) VALUES (:user_id, :partenaire_id, NOW(), :content)');
              $addcomm->execute(array(
              'user_id' => $user_id,
              'partenaire_id' => $id_acteur, 
              'content' => $post));
              echo '<p style="color: green;"> Merci pour votre commentaire <?php echo $_SESSION["username"]?> !</p> 
              <p> <a href="main.php"> Retour à l\'accueil </a>';     
            }    
            else
            {
              echo '<p style="color:  rgb(252, 116, 106);"> Veuillez remplir tous les champs !</p>'; 
            } 
          }
          else
          {
            echo '<p style="color: rgb(252, 116, 106);"> Vous ne pouvez commenter qu\'une seule fois !</p>
            <p> <a href="main.php"> Retour à l\'accueil ></a>';
          }
        }
      ?>
    </div>
    <?php 
      include 'include/footer.php'; 
    ?> 
  </div>  
</body>
        