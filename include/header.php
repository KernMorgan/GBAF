<header>    
  <a href="main.php"> <img src="images\logo.png" alt="Logo" width="110" height="131.12" ></a>
  <div class= "left-header">
    <?php 
      echo  $_SESSION['surname'] . ' ' . $_SESSION['name'] ;
    ?>
     <br>
    <a href="profile.php">Paramètres du compte</a>
    <br>
    <a href="deconnexion.php">Se déconnecter</a>
  </div>
</header>