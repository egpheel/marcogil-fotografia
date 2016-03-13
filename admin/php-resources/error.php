<?php
session_start();

$previousPage = $_SESSION['origin_page'];

$errorMsg = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);

if (!$errorMsg) {
  $errorMsg = 'Oops! Ocorreu algum erro.';
}
?>

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
  <div class="container">
    <h1>Ocorreu um erro :(</h1>
    <p class="error">
      <?php echo $errorMsg; ?>
    </p>
    <p><a href="<?php echo $previousPage ?>">Voltar</a></p>
  </div>
</body>

</html>
