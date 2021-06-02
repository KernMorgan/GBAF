<?php
session_start();
?>
<head>
    <!DOCTYPE html>
    <meta charset="utf-8" />
    <title>profile</title>
   	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
</head>
<body>
  <div class= "container">
    <?php 
      include 'include/header.php'; 
    ?> 
    <div class="start">
   <form class="form" action="profile.php" method="post">
        <p>       
            <input type="text" name="nom" value=" <?php echo $_POST['nom'];?>" />
            <br>
            <input type="text" name="prenom" value=" <?php echo $_POST['prenom'];?>" />
            <br>
            <input type="text" name="username" value=" <?php echo $_POST['username'];?>" />
            <br>
            <input type="password" name="password" value=" <?php echo $_POST['password'];?>"/>
            <br>
            <input type="text" name="question" value=" <?php echo $_POST['question'];?>"/ />
            <br>
            <input type="text" name="questionanswer" value=" <?php echo $_POST['questionanswer'];?>"/ />
            <br>
            <input type="submit" value="Valider" />
            <br>
            <a href="index.php">Retournez à l'index</a></p>
        </p>
    </form>
</div>
</body>
  <?php 
         include 'include/footer.php'; 
    ?> 
</div>
</body>
</html>

