<header>    
 
  <a href="main.php"> <img src="images\logo.png" alt="Logo" width="110" height="131.12" ></a>
  <div class= "left-header">
    <p>
      <?php 
        echo '<h2>Bonjour' . $_SESSION['username'] . '</h2>';
      ?>
    <br>
    <a href="profile.php">Modifier mon profil</a>
    <br>
    <a href="deconnexion.php">Se déconnecter</a></p>
  </div>
</header>