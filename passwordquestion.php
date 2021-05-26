<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>GBAF</title>
    <link rel=“stylesheet” href=“style.css”>
</head>

<body>
  <h1>GBAF</h1>
  <p>Répondez à votre question secrète</p>
  <br>
   <?php echo $_POST['question'];?>
    <input type="text" name="questionanswer" />
    <br>
    <input type="submit" value="Valider" />
  </form>
</body>

</html>
