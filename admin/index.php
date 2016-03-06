<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!--my JS-->
    <script src="js/functions.js"></script>
    <!--my CSS-->
    <link rel="stylesheet" href="css/layout.css">
    <title>Marco Gil - Painel de administração</title>
  </head>
  <body>
    <form action="php-resources/upload.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="#fileToUpload">Escolha a imagem:</label>
        <input id="fileToUpload" type="file" name="fileToUpload" accept="image/gif, image/jpeg, image/png">
      </div>
      <input type="submit" value="Enviar" name="submit" class="btn btn-default">
    </form>
  </body>
</html>