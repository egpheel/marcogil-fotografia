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
    <!--my CSS-->
    <link rel="stylesheet" href="css/layout.css">
    <title>Marco Gil - Painel de administração</title>
  </head>
  <body>
    <div id="upload">
      <form action="php-resources/upload.php" method="post" enctype="multipart/form-data">
        <div class="form-group left">
          <div class="radio">
            <p><strong>Categorias:</strong></p>
            <label class="radio-inline">
              <input id="cat1" type="radio" value="cat1" name="categories">Pessoas
            </label>
            <label class="radio-inline">
              <input id="cat2" type="radio" value="cat2" name="categories">Paisagens
            </label>
            <label class="radio-inline">
              <input id="cat3" type="radio" value="cat3" name="categories">Nocturnas
            </label>
            <label class="radio-inline">
              <input id="cat4" type="radio" value="cat4" name="categories">Cidades
            </label>
            <label class="radio-inline">
              <input id="cat5" type="radio" value="cat5" name="categories">Perspectivas
            </label>
          </div>
          <label for="#fileToUpload">Escolha a fotografia:</label>
          <input id="fileToUpload" type="file" name="fileToUpload" accept="image/gif, image/jpeg, image/png">
          <label for="#thumbToUpload">Escolha o thumbnail:</label>
          <input id="thumbToUpload" type="file" name="thumbToUpload" accept="image/gif, image/jpeg, image/png">
        </div>
        <div class="form-group right">
          <input id="loc" type="text" placeholder="Localização" name="loc" class="form-control">
          <textarea rows="7" placeholder="Descrição" name="texto" class="form-control texto"></textarea>
        </div>
        <input type="submit" value="Enviar" name="submit" class="btn btn-default btn-lg">
      </form>
    </div>
  </body>
</html>