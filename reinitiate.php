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
</head>
<body>
  <div class= "container">
    <?php 
      include 'include/header1.php';  
    ?>
    <div class="start">
      <p>Nouveau mot de passe:</p>
      <form class="form" action="reinitiate.php" method="post">
        <p><br> 
        <input type="text" name="password"/>
        <br>
        <input type="submit" name = "submit" value="Valider" />
      </form>
         <?php        
        if(isset($_POST['submit']) )
        {
          if (isset($_POST['password']) AND !empty($_POST['password']))
          { 
            $id = $_SESSION['id'];
            $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $modifyprof = $bdd->prepare("UPDATE users SET  password = :password WHERE id = :id");
            $modifyprof->execute(array(
            'id' => $id,
            'password' => $pass_hache,
            ));
            $message = 'Votre mot de passe a bien été modifié !';
            echo "<SCRIPT> //not showing me this
            alert('$message')
            window.location.replace('index.php');
c           </SCRIPT>";
          }
          else 
          {
           echo '<p style="color: red;"> Veuillez remplir tout les champs !</p>';
          }
        }      
      ?>        
    </div>
  </div>
    <div class="footer-diconnected">
      <?php
        include 'include/footer.php'; 
      ?>   
    </div>
</body>


